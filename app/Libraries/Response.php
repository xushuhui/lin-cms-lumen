<?php
namespace App\Libraries;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 13:40
 */
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
}