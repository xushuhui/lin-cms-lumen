<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Http\Controllers\cms;

use App\Requests\CreateGroupRequest;
use App\Services\AuthService;
use App\Requests\ChangeUserPasswordRequest;

class AdminController
{
    public $service;
    public function __construct(AuthService $service)
    {
        $this->service =$service;
    }
    //查询所有可分配的权限
    public function authority()
    {
        return $this->service->authority();
    }
    //查询所有用户
    public function getAdminUsers()
    {
        return $this->service->getAdminUsers();
    }
    //修改用户密码
    public function changeUserPassword(ChangeUserPasswordRequest $request)
    {
        return $this->service->changeUserPassword($request);;
    }
    //管理员更新用户信息
    public function deleteUser()
    {
        # code...
    }
    //禁用用户
    public function disableUser()
    {
        # code...
    }
    //激活用户
    public function activeUser()
    {
        # code...
    }
    //查询所有权限组及其权限
    public function getAdminGroups()
    {
        # code...
    }
    //查询所有权限组
    public function getAllGroup()
    {
        # code...
    }
    //查询一个权限组及其权限
    public function getGroup()
    {
        # code...
    }
    //新建权限组
    public function createGroup(CreateGroupRequest $request)
    {

        return $this->service->setAvatar($request);
    }
    //更新权限组
    public function updateGroup()
    {
        # code...
    }
    //删除权限组
    public function deleteGroup()
    {
        # code...
    }
    //分配单个权限
    public function dispatchAuth()
    {
        # code...
    }
    //分配多个权限
    public function dispatchAuths(Type $var = null)
    {
        # code...
    }
    //删除多个权限
    public function removeAuths()
    {
        # code...
    }
}
