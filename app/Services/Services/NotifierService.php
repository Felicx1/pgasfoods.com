<?php

namespace App\Services\Asyncronious;

use App\Services\Service;
use App\Repositories\Asyncronious\RecordRepository;
use Phynixmedia\Mailer\Mailer;

class NotifierService extends Service {

    protected $repository;

    protected $mailer;

    public function __construct(){

        $this->repository = new RecordRepository();

        $this->mailer = new Mailer(env("FERAMY_MAILER"));
    }

    /**
     * This method sends all emails and or sms if enabled
     * except for autonotifier
     */
    public function run($data){

        if(! $data){

            // $this->autoNotifier();
            return false;
        }

        $mail   = (array) _value($data, "mail");
        $sms    = (array) _value($data, "sms");

        return $this->mailer->send($mail, $sms);
    }


    /**
     * Background service auto notifier
     * This check the status of application to see which one is ready and then notify the user
     * it works in relation to an auto_notice field in the database.
     */
    public function autoNotifier(){

        $records = $this->repository->fetch();

        \Log::info("Auto Notice -->> " . json_encode($records));

        if(! $records){
            return false;
        }

        foreach($records as $record){

            \Log::info("Auto Notice Records-->> " . json_encode($record));

            $data = self::notify($record);

            \Log::info("Auto Notice Data Email -->> " . json_encode($data));

            if(! $data) {

                continue;
            }

            $params = ["auto_notice"=>1];
            $target = ["id"=>$record->id, "user_id"=>$record->user_id];

            if(! $this->update($params, $target)){

                return false;
            }

            $sms = $data->sms ?? null;
            $mail = $data->mail ?? null;


            if($mail && $sms){

                return $this->mailer->send((array) $data->mail, (array) $sms);
            }

            //send only sms
            if($mail){
                return $this->mailer->send((array) $mail);
            }
        }

    }

    private static function notify($row){

        try{

            if($row->status == 5 && $row->result > -1){

                \Log::info("Auto Notice Dtat Row-->> " . json_encode($row));

                $user = $row->user ?? null;

                if(! $user){

                    return false;
                }

                if($user->email ?? '')
                {

                    $email = $user->email;
                    $name = $user->name ?? '';

                    $data = (object)[
                        'to'        => $email,
                        'from'      => env("APP_MAIL_SENDER"),
                        'subject'   => "Your Covid Test Result is Ready",
                        'message'   => view('app::mail.test-completed', compact('name'))->render(),
                    ];

                    $link = env("APP_PHONE_SENDER"); // this will be app or vendour phone number
                    $vendor = env("APP_NAME");

                    $sms = (object)[
                        "to"    => $user->phone,
                        "from"  => env("APP_NOTICE_SENDER"),
                        "code"  => env("APP_NOTICE_SENDER"),
                        "sms"   => "Dear {$name}, \nYour covid Test result is now available. Login to your account via the link below to download certificate.\n{$link}. \n{$vendor}"
                    ];

                    // event(new NotifierEvent($data));

                    return (object)["mail" => $data, "sms" => $sms];
                }
            }

            return null;

        }catch(\Exception $e){

            \Log::info("Request Status -->  " . $e->getmessage());
            return null;
        }

    }

}
