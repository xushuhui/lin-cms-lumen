<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Requests\User;

use App\Libraries\RequestValidate;

class RegisterRequest extends RequestValidate
{
    public $nickname;
    public $password;
    public $email;
    public $rules = [
        'nickname'   => 'required|max:50',
        'password'  => 'required',
        'email' => 'required|email'
    ];
    public function load()
    {
        $this->nickname   = $this->data['nickname'];
        $this->password  = $this->data['password'];
        $this->email = $this->data['email'];
    }
}
