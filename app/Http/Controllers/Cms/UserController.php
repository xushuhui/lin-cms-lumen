<?php

namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }
    //注册
    public function register()
    {
        return "rests";
    }
    //登录
    public function login(Request $request)
    {
//        $password =  Hash::make(123456);
//        $user = new User();
//        $user->nickname = 'super';
//        $user->password = $password;
//        $user->save();
//        User::create([
//            'password' =>  $password,
//            'nickname' => 'super',
//
//        ]);
        if (! $token = $this->jwt->attempt($request->only('nickname','password'))) {
            return response()->json(['user_not_found'], 404);
        }
//
//        return response()->json(compact('token'));
//        return [
//            'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9',
//            'refresh_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'
//        ];
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
    public function information()
    {
        # code...
    }
    //刷新令牌
    public function refresh()
    {
        # code...
    }
    //查询自己拥有的权限 验证token
    public function auths()
    {
        return [
            'id'=> 1,
            'active' => 1,
            'auths' => [],
            'create_time' => 1546339219000,
            'delete_time'=> null,
            'email' => '12345678@qq.com',
            'group_id'=> null,
            'nickname' => 'super',
            'super' => 2,
            'update_time'=> '2019-03-18T10:21:58Z'
        ];

    }
}
