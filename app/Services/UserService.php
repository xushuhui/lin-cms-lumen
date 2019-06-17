<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/31
 * Time: 14:16
 */

namespace App\Services;


use App\Libraries\ErrorCodeTable;
use App\Libraries\Response;
use App\Requests\User\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Requests\User\RegisterRequest;
use App\Models\User;
use App\Requests\User\SetAvatorRequest;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public $result;

    public function __construct()
    {
        $this->result = new Response();
    }
    public function getCurrentUser(){
        return JWTAuth::user();
    }
    //登录
    public function login(LoginRequest $request)
    {
        do{
            $token = JWTAuth::attempt(['nickname'=>$request->nickname,'password'=>$request->password]);
            if (!$token) {
                $this->result->fail(ErrorCodeTable::CODE_NO_USER);
                break;
            };
            $this->result->setData(['token'=>$token]);
        }while(false);
        return $this->result->toArray();
    }
    public function register(RegisterRequest $request)
    {
        do{
            $userModel           = new User();
            $user = $userModel->getUserByEmail($request->email);
            if($user){
                $this->result->fail(ErrorCodeTable::CODE_USER_EXIST);
                break;
            }
            $user = $userModel->getUserByNickName($request->nickname);
            if($user){
                $this->result->fail(ErrorCodeTable::CODE_USER_EXIST);
                break;
            }
            $userModel->nickname = $request->nickname;
            $userModel->password = Hash::make($request->password);
            $userModel->email = $request->email;
            if (!$userModel->save()) {
                $this->result->fail(ErrorCodeTable::CODE_SQL_ERROR);
                break;
            };
        }while(false);
        return $this->result->toArray();    
    }
    //设置头像
    public function setAvatar(SetAvatorRequest $request)
    {
        do{
            $userId = JWTAuth::user()->id;
            $userModel           = User::find($userId);
            $userModel->avatar = $request->avatar;
            if (!$userModel->save()) {
                $this->result->fail(ErrorCodeTable::CODE_SQL_ERROR);
                break;
            };
        }while(false);
        return $this->result->toArray();
    }
}