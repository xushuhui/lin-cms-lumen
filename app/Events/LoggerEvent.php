<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

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
