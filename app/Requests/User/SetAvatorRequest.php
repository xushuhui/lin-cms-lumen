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

class SetAvatorRequest extends RequestValidate
{
    public $avatar;
   
    public $rules = [
        'avatar'   => 'required',
       
    ];
    public function load()
    {
        $this->avatar   = $this->data['avatar'];
    }
}
