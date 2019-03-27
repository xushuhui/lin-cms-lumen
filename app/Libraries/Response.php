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
    protected  $data = [];
    public function  setData($data)
    {
        $this->data = $data;
    }
    public function  getData()
    {
        return $this->data;
    }
}