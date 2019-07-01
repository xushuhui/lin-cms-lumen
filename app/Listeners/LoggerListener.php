<?php

namespace App\Listeners;

use App\Events\LoggerEvent;
use App\Models\Log;

class LoggerListener
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
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(LoggerEvent $event)
    {
        $logModel = new Log();
        $logModel->message = $event->data['msg'];
        $logModel->user_name = $event->data['nickname'];
        $logModel->user_id = $event->data['user_id'];
        $logModel->save();

    }
}