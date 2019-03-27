<?php
namespace App\Requests;


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
//            throw new BaseExcetion([
//                'msg' => is_array($msg) ? implode(' ', $msg) :$msg
//            ]);
            dump($msg);
        }

        return [
            //
        ];
    }

}