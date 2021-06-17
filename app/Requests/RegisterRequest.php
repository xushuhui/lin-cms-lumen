<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */
namespace App\Requests;

use App\Libs\RequestValidate;

class RegisterRequest extends RequestValidate
{
    public $nickname;
    public $password;
    public $email;
    public $username;
    public $groupId;
    public $avatar;
    public $rules = [
        'nickname'   => 'required|max:50',
        'username'   => 'required|max:50',
        'password'  => 'required',
        'avatar'  => 'required',
        'group_id'  => 'required',
        'email' => 'required|email'
    ];
    public function load()
    {
        $this->nickname   = $this->data['nickname'];
        $this->password  = $this->data['password'];
        $this->email = $this->data['email'];
        $this->username = $this->data['username'];
        $this->groupId = $this->data['group_id'];
        $this->avatar = $this->data["avatar"];
    }
}
