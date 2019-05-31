<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/31
 * Time: 14:17
 */

namespace App\Requests\User;


use App\Libraries\RequestValidate;

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

        return true;
    }
}