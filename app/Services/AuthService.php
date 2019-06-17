<?php
namespace App\Services;

use App\Libraries\Response;

class AuthService
{
    public $result;

    public function __construct()
    {
        $this->result = new Response();
    }
    public function authority()
    {
        $arr = [
            "信息" =>[
                "查看lin的信息" =>["cms.test+info"]
            ],
            "图书" =>[
                "删除图书" =>["v1.book+delete_book"]
            ],
            "日志" =>[
                "搜索日志" =>["cms.log+get_user_logs"],
                "查询所有日志" =>["cms.log+get_logs"],
                "查询日志记录的用户" =>["cms.log+get_users"],
            ],
        ];
        $this->result->setData($arr);
        return $this->result->toArray();

    }
}