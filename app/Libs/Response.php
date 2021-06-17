<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Libs;

class Response
{
    protected $data = [];
    protected $code  = 0;
    protected $message = 'OK';

    public function fail($code)
    {
       $this->setCode($code);
       return $this;
    }

    public function succeed()
    {
        $this->setCode(CodeTable::OK);
        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;
        $this->message = CodeTable::$table[$code];
    }
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setResult($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
        return $this;
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
