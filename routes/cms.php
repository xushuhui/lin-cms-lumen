<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
$router->group(['prefix' => 'cms','namespace' => '\App\Http\Controllers\cms'], function () use ($router) {
    // 账户相关接口分组
    $router->group(['prefix' =>'user'], function () use ($router) { 
         // 登陆接口
        $router->post('login', 'UserController@login');
        // 刷新令牌
        $router->get('refresh', 'UserController@refresh');
        // 查询自己拥有的权限
        $router->get('auths', 'UserController@auths');
        // 注册一个用户
        $router->post('register', 'UserController@register');
         // 更新头像
        $router->put('avatar', 'UserController@setAvatar');
        // 查询自己信息
        $router->get('information', 'UserController@getInformation');
    });
    $router->group(['prefix' =>'admin'], function () use ($router) {
        // 查询所有权限组
        $router->get('group/all', 'AdminController@getGroupAll');
        // 查询一个权限组及其权限
        $router->get('group/:id', 'AdminController@getGroup');
        // 删除一个权限组
        $router->delete('group/:id', 'AdminController@deleteGroup');
        // 更新一个权限组
        $router->put('group/:id', 'AdminController@updateGroup');
         // 新建权限组
        $router->post('group', 'AdminController@createGroup');
        // 查询所有可分配的权限
        $router->get('authority', 'AdminController@authority');
         // 删除多个权限
        $router->post('remove', 'AdminController@removeAuths');
         // 添加多个权限
        $router->post('/dispatch/patch', 'AdminController@dispatchAuths');
         // 查询所有用户
        $router->get('users', 'AdminController@getAdminUsers');
         // 修改用户密码
        $router->put('password/:uid', 'AdminController@changeUserPassword');
         // 删除用户
        $router->delete(':uid', 'AdminController@deleteUser');
         // 更新用户信息
        $router->put(':uid', 'AdminController@updateUser');
    });
    // 日志类接口
    $router->get('log/', 'LogController@getLogs');
    $router->get('log/users', 'LogController@getUsers');
    $router->get('log/search', 'LogController@getUserLogs');
});
