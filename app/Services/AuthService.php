<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Services;

use App\Requests\Admin\ChangeUserPasswordRequest;

interface AuthService
{
 
    public function authority();
    
    public function getAdminUsers();
   
    public function changeUserPassword(ChangeUserPasswordRequest $request);
    
}
