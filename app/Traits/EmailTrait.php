<?php

namespace App\Traits;

use App\Events\Mail\OnMailSend;

trait EmailTrait
{

    public function user(){


    }

    public static function admin(array $data, array $sms = []){
        /**
         * Send email to admin
         */
        $data["to"] = env("APP_MAIL_ADMIN");
        $data["template"] = 'notice.admin';
        $data['subject']   = "New Enquiry Received";

        $data = self::data($data);

        $data["sms"] = $sms;

        return $data;
    }


    public static function sms(){

        return [
            "issms"     => false,
            "to"        => env("APP_PHONE_SENDER"),
            "from"      => "GABESTFOODS",
            "sms"       => "An order has come through, Please login to confirm."
        ];
    }

    public static function data(array $mail)
    {

        $mail = (object) $mail;

        $data = [
            'to'        => _value($mail, 'to'),
            'from'      => env('APP_MAIL_SENDER'),
            'subject'   => $mail->subject??'',
            'message'   => view('web::mail.' . $mail->template, compact('mail'))->render(),
        ];

        return $data;
    }

}
