<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use App\Requests\LoginRequest;
use App\Services\UserService;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Requests\RegisterRequest;
use App\Requests\SetAvatorRequest;

class UserController extends Controller
{
    public $service;
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }
    //注册
    public function register(RegisterRequest $request)
    {
        if ($request->validates() && $request->load()) {
            $result =  $this->service->register($request);
        } else {
            $result =  $request->getLastError();
        }
        return $result;
    }

    //登录
    public function login(LoginRequest $request)
    {
        if ($request->validates() && $request->load()) {
            $result =  $this->service->login($request);
        } else {
            $result =  $request->getLastError();
        }
        return $result;
    }
    //设置头像
    public function setAvatar(SetAvatorRequest $request)
    {
        if ($request->validates() && $request->load()) {
            $result =  $this->service->setAvatar($request);
        } else {
            $result =  $request->getLastError();
        }
        return $result;
    }
   


    //更新用户信息
    public function update()
    {
        # code...
    }

    //修改密码
    public function changePassword()
    {
        # code...
    }

    //查询自己信息
    public function getInformation()
    {
        $result =  $this->service->getInfo();
        return $result;
    }

    //刷新令牌
    /**
    * 刷新token，如果开启黑名单，以前的token便会失效，指的注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function refresh()
    {
        $result =  $this->service->refreshToken();
        return $result;
    }

    //查询自己拥有的权限 验证token
    public function auths()
    {
        $result =  $this->service->getAuths();
        return $result;
    }
    /**
    * 注销，把所给token加入黑名单
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function deleteToken()
    {
        JWTAuth::parseToken()->invalidate();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * 将返回结果包装
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => JWTAuth::factory()->getTTL() * 60,
        ]);
    }
}
