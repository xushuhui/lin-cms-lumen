<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Libraries;

class Response
{
    protected $data = [];
    protected $code  = 0;
    protected $message = 'OK';

    public function fail($code)
    {
        self::setCode($code);
    }

    public function succeed()
    {
        self::setCode(CodeTable::OK);
    }

    public function setCode($code)
    {
        $this->code = $code;
        $this->message = CodeTable::$table[$code];
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setResult($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function isFailed()
    {
        return $this->code !== CodeTable::OK;
    }

    public function isSucceed()
    {
        return $this->code === CodeTable::OK;
    }
    public function toArray()
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
