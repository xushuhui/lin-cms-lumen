<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Services\Impl;

use App\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Requests\RegisterRequest;
use App\Models\User;
use App\Requests\SetAvatorRequest;
use Illuminate\Support\Facades\Hash;
use App\Events\LoggerEvent;
use App\Services\UserService;

class UserServiceImpl implements UserService
{

    public function getCurrentUser()
    {
        return JWTAuth::user();
    }
    //登录
    public function login(LoginRequest $request)
    {
        $token = JWTAuth::attempt(['nickname' => $request->nickname, 'password' => $request->password]);
        event(new LoggerEvent([
            'nickname' => $request->nickname,
            'message' => "登陆成功获取了令牌",
            'user_id' => JWTAuth::user()->id
        ]));
        return ['token' => $token];
    }
    public function register(RegisterRequest $request)
    {
        $userModel           = new User();
        $user = $userModel->getUserByEmail($request->email);
        if ($user) {
        }

        $user = $userModel->getUserByNickName($request->nickname);
        if ($user) {
        }
        $userModel->nickname = $request->nickname;
        $userModel->password = Hash::make($request->password);
        $userModel->email = $request->email;

        return $userModel->save();
    }
    //设置头像
    public function setAvatar(SetAvatorRequest $request)
    {
        $userId = JWTAuth::user()->id;
        $userModel           = User::find($userId);
        if (!$userModel) {
        };
        $userModel->avatar = $request->avatar;
        $userModel->save();
    }
    public function getInfo()
    {
        return JWTAuth::user();
    }
    public function refreshToken()
    {
        $refreshToken = JWTAuth::parseToken()->refresh();
        return ['token' => $refreshToken];
    }
    public function getAuths()
    {
        $user = JWTAuth::user();
        $userModel           = User::find($user->id);
        if (!$userModel) {
        };
        if (!$user->group_id) {
            $user['auths'] = [];
        }

        ///TODO
        // {
        //     "active": 1,
        //     "admin": 1,
        //     "auths": [
        //         {
        //             "信息": [
        //                 {
        //                     "auth": "查看lin的信息",
        //                     "module": "信息"
        //                 }
        //             ]
        //         },
        //         {
        //             "图书": [
        //                 {
        //                     "auth": "删除图书",
        //                     "module": "图书"
        //                 }
        //             ]
        //         }
        //     ],
        //     "avatar": null,
        //     "create_time": 1560752840000,
        //     "email": "123456@er.com",
        //     "group_id": 32,
        //     "id": 58,
        //     "nickname": "ee",
        //     "update_time": 1560757604000
        // }
    }
}
