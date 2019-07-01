<?php

namespace App\Events;


class LoggerEvent extends Event
{
    public $data;
    //创建一个事件
    public function __construct($data)
    {
        $this->data = $data; 
    }
}