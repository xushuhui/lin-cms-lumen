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
    public $message;
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
            $message = $validator->errors()->all();

            $this->message = is_array($message) ? implode(' ', $message) : $message;
            return false;
        }
        return true;
    }
    public function getLastError()
    {
        $result = new Response();
        $result->setResult(CodeTable::INVALID_PARAMS, $this->message);
        return $result->toArray();
    }
    public function error()
    {
        $result = new Response();
        $result->fail(CodeTable::INVALID_PARAMS);
        return $result->toArray();
    }
}
