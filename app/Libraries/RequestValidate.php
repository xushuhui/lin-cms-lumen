<?php
namespace App\Libraries;


use Illuminate\Support\Facades\Validator;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 12:41
 */

class RequestValidate
{
    public $rules;
    public $msg;
    public function validates($data)
    {
        $validator =  Validator::make($data,$this->rules);
        if ($validator->fails()) {
            $msg = $validator->errors()->all();
            $this->msg = is_array($msg) ? implode(' ', $msg) :$msg;
            return false;
        }
        return true;
    }
    public  function getLastError()
    {
        $result = new Response();
        $result->setResult(ErrorCodeTable::CODE_INVALID_PARAMS,$this->msg);
        return $result->toArray();
    }
    public  function error()
    {
        $result = new Response();
        $result->fail(ErrorCodeTable::CODE_INVALID_PARAMS);
        return $result->toArray();
    }

}