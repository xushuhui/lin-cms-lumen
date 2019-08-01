<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Requests\Admin;

class ChangeUserPasswordRequest
{
    //{"new_password":"123456","confirm_password":"123456"}
    public $newPassword;
    public $confirmPassword;
    public $id;
    public $rules = [
        'new_password'   => 'required|max:50',
        'confirm_password'  => 'required',
        
    ];
    public function load()
    {
        $this->newPassword   = $this->data['new_password'];
        $this->confirmPassword  = $this->data['confirm_password'];
        $this->id = $this->data['uid'];
        return true;
    }
}
