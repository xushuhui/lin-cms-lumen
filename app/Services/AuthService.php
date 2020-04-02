<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Services;

use App\Libraries\Response;
use App\Requests\Admin\ChangeUserPasswordRequest;
use App\Models\User;

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
            "信息" => [
                "查看lin的信息" => ["cms.test+info"]
            ],
            "图书" => [
                "删除图书" => ["v1.book+delete_book"]
            ],
            "日志" => [
                "搜索日志" => ["cms.log+get_user_logs"],
                "查询所有日志" => ["cms.log+get_logs"],
                "查询日志记录的用户" => ["cms.log+get_users"],
            ],
        ];
        $this->result->setData($arr);
        return $this->result->toArray();
    }
    public function getAdminUsers()
    {
        $arr = [];
        $this->result->setData($arr);
        return $this->result->toArray();
    }
    public function changeUserPassword(ChangeUserPasswordRequest $request)
    {
        do {
            $userModel = User::find($request->id);
            if (!$userModel) {
                $this->result->fail(CodeTable::NO_USER);
                break;
            };
            $userModel->password = $request->newPassword;
            if (!$userModel->save()) {
                $this->result->fail(CodeTable::SQL_ERROR);
                break;
            };
            $this->result->succeed();
        } while (false);
        return $this->result->toArray();
    }
}
