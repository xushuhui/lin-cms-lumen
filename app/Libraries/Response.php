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
    protected $error_code  = 0;
    protected $msg = 'OK';

    public function  fail($code)
    {
        self::setCode($code);
    }

    public function  succeed()
    {
        self::setCode(ErrorCodeTable::CODE_OK);
    }

    public function setCode($code)
    {
        $this->error_code = $code;
        $this->msg = ErrorCodeTable::$table[$code];

    }
    public function  setData($data)
    {
        $this->data = $data;
    }
    public function  getData()
    {
        return $this->data;
    }
    public function setResult($code,$msg)
    {
        $this->error_code = $code;
        $this->msg = $msg;
    }

    public function  isFailed()
    {
        return $this->error_code !== ErrorCodeTable::CODE_OK;
    }

    public function  isSucceed()
    {
        return $this->error_code === ErrorCodeTable::CODE_OK;
    }
    public function toArray()
    {
        return [
            'error_code'=>$this->error_code,
            'msg'=>$this->msg,
            'data'=>$this->data
        ];
    }
}