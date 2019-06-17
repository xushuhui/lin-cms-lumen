<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/31
 * Time: 14:17
 */

namespace App\Requests\User;


use App\Libraries\RequestValidate;

class SetAvatorRequest  extends RequestValidate
{
    public $avatar;
   
    public $rules = [
        'avatar'   => 'required',
       
    ];
    public function load()
    {
        $this->avatar   = $this->data['avatar'];
        return true;
    }
}
