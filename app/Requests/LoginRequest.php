<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Requests;

use App\Libs\RequestValidate;

class LoginRequest extends RequestValidate
{
    public $nickname;
    public $password;
   
    public $rules = [
        'nickname'   => 'required|max:50',
        'password'  => 'required',
        
    ];
    public function load()
    {
        $this->nickname   = $this->data['nickname'];
        $this->password  = $this->data['password'];
    }
}
