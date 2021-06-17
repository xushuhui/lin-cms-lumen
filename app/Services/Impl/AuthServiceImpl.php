<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Services\Impl;

use App\Requests\Admin\ChangeUserPasswordRequest;
use App\Models\User;
use App\Services\AuthService;

class AuthServiceImpl implements AuthService
{
 
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
        return $arr;
    }
    public function getAdminUsers()
    {
        $arr = [];
        return $arr;
    }
    public function changeUserPassword(ChangeUserPasswordRequest $request)
    {
        $userModel = User::find($request->id);
        $userModel->password = $request->newPassword;
        return $userModel->save();
       
    }
}
