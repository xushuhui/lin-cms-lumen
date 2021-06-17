<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

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
     * @param LoggerEvent $event
     * @param Log $logModel
     * @return void
     */
    public function handle(LoggerEvent $event, Log $logModel)
    {
        $logModel->message = $event->data['message'];
        $logModel->user_name = $event->data['nickname'];
        $logModel->user_id = $event->data['user_id'];
        $logModel->save();
    }
}
