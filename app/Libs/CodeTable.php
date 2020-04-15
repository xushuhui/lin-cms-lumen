<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Libs;

class CodeTable
{
    const OK                      = 0;
    const SQL_ERROR          = 1;
    const INVALID_PARAMS          = 2;
    const SYSTEM_ERROR            = 3;
    const NO_USER                      = 4;
    const USER_EXIST = 5;
    public static $table = [
        self::SQL_ERROR => '数据库错误',
        self::INVALID_PARAMS   => '无效参数',
        self::INVALID_PARAMS   => '系统错误',
        self::OK    => 'ok',
        self::NO_USER    => '用户不存在或密码错误',
        self::USER_EXIST    => '用户已存在',
    ];
}
