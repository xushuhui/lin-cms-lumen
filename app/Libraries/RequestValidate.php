<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Libraries;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RequestValidate extends Request
{
    public $rules;
    public $msg;
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->data = json_decode($this->getContent(), true);
    }
    public function validates()
    {
        $validator =  Validator::make($this->data, $this->rules);
        if ($validator->fails()) {
            $msg = $validator->errors()->all();

            $this->msg = is_array($msg) ? implode(' ', $msg) :$msg;
            return false;
        }
        return true;
    }
    public function getLastError()
    {
        $result = new Response();
        $result->setResult(ErrorCodeTable::CODE_INVALID_PARAMS, $this->msg);
        return $result->toArray();
    }
    public function error()
    {
        $result = new Response();
        $result->fail(ErrorCodeTable::CODE_INVALID_PARAMS);
        return $result->toArray();
    }
}
