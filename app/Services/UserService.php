<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */
namespace App\Services;

use App\Requests\LoginRequest;
use App\Requests\RegisterRequest;
use App\Requests\SetAvatarRequest;

interface UserService{
    public function register(RegisterRequest $request);
    public function login(LoginRequest $request);
    public function setAvatar(SetAvatarRequest $request);
    public function getInfo();
    public function refreshToken();
    public function getAuths();
}