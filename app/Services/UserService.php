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
class UserService
{
    public $result;

    public function __construct()
    {
        $this->result = new Response();
    }
    public function login(LoginRequest $request)
    {
        do{
            $token = JWTAuth::attempt($request->only('nickname', 'password'));
            if (!$token) {
                $this->result->fail(ErrorCodeTable::CODE_NO_USER);
                break;
            };
            $this->result->setData(['token'=>$token]);
        }while(false);
        return $this->result->toArray();
    }
}