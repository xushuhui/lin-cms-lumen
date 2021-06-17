<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Libs\Response;
use App\Requests\LoginRequest;
use App\Services\UserService;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Requests\RegisterRequest;
use App\Requests\SetAvatarRequest;
use Tymon\JWTAuth\JWT;

class UserController extends Controller
{
    public $service;
    public $response;
    public function __construct(UserService $userService,Response $response)
    {
        $this->service = $userService;
        $this->response = $response;
    }
    //注册
    public function register(RegisterRequest $request)
    {
        if (!$request->validate()){
            return $request->getLastError();
        };
        $request->load();
         $res= $this->service->register($request);
        return $res->toArray();
       
    }

    //登录
    public function login(LoginRequest $request)
    {
        if (!$request->validate()){
            return $request->getLastError();
        };
        $request->load();
        $data = $this->service->login($request);
        return $this->response->setData($data);
    }
    //设置头像
    public function setAvatar(SetAvatarRequest $request)
    {
        if (!$request->validate()){
            return $request->getLastError();
        };
        $request->load();
        return $this->service->setAvatar($request);
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
        return $this->service->getInfo();
    }

    //刷新令牌
    /**
    * 刷新token，如果开启黑名单，以前的token便会失效，指的注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function refresh()
    {
        return $this->service->refreshToken();
    }

    //查询自己拥有的权限 验证token
    public function auths()
    {
        return $this->service->getAuths();
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
