<?php
namespace App\Http\Controllers\Cms;

class AdminController  
{
    //查询所有可分配的权限
    public function authority()
    {

    }
    //查询所有用户
    public function getAdminUsers()
    {
    }
    //修改用户密码
    public function changeUserPassword()
    {
        # code...
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
    public function createGroup()
    {
        # code...
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
