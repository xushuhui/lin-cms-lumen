<?php
namespace App\Libraries;


use Illuminate\Support\Facades\Validator;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 12:41
 */

class Request
{
    public $rules;
    public function validates($data)
    {
        $validator =  Validator::make($data,$this->rules);
        if ($validator->fails()) {
            $msg = $validator->errors()->all();
            $msg = is_array($msg) ? implode(' ', $msg) :$msg;
            return self::getLastError($msg);
        }
        return true;
    }
    public  function getLastError($msg)
    {
        $result = new Response();
        $result->setResult(ErrorCodeTable::CODE_INVALID_PARAMS,$msg);
        return $result->toArray();
    }


}