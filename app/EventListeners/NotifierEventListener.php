<?php

namespace App\EventListeners;

use App\Events\NotifierEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Services\NotifierService;

class NotifierEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotifierEvent  $event
     * @return void
     */
    public function handle(NotifierEvent $event)
    {

        /**
         * use this method
        */
        if( _value($event, "is_instant", false) )
        {
            (new NotifierService())->run($event->data);
            return;
        }
        (new EmailAutoLogService())->runMultipleNotice($event->data);

    }
}
