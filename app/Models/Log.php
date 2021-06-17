<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */
namespace App\Models;

class Log extends BaseModel
{
    protected $table='lin_log';

    public $message,$user_name,$user_id;
}
