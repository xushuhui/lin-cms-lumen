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
    public $result;
    public function __construct(Response $result)
    {
        parent::__construct();
        $this->data = json_decode($this->getContent(), true);
        $this->result = $result;
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
        return $this->result->setResult(CodeTable::INVALID_PARAMS, $this->message);
    }
    public function error()
    {
        return $this->result->fail(CodeTable::INVALID_PARAMS);
    }
}
