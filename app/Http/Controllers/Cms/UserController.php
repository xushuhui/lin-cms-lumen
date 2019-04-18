<?php

namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserController extends Controller
{

    //注册
    public function register(Request $request)
    {
        $user = new User();
        $user->nickname = $request->post('nickname');
        $user->password = Hash::make($request->input('password'));
        
        $user->save();
        return "rests";
    }
    //登录
    public function login(Request $request)
    {
//        $password =  Hash::make(123456);
//       $user = new User();
//       $user->nickname = 'super';
//       $user->password = $password;
//       return $user->save();
//        User::create([
//            'password' =>  $password,
//            'nickname' => 'super',
//
//        ]);
         $token =  JWTAuth::attempt($request->only('nickname','password'));
         if (! $token) {

             return response()->json(['user_not_found'], 404);
         }

       return response()->json(compact('token'));
//        return [
//            'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9',
//            'refresh_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'
//        ];
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
     * 刷新token，如果开启黑名单，以前的token便会失效，指的注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        return $this->respondWithToken(JWTAuth::parseToken()->refresh());
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
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }
    
    /**
     * 获取当前token的鉴权用户
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(JWTAuth::user());
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
