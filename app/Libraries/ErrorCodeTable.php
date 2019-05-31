<?php
namespace App\Libraries;
class ErrorCodeTable
{
    const CODE_SQL_ERROR          = -3;
    const CODE_INVALID_PARAMS          = -2;
    const CODE_SYSTEM_ERROR            = -1;
    const CODE_OK                      = 0;
    const CODE_NO_USER                      = 1000;
    public static $table = [
        self::CODE_SQL_ERROR => '数据库错误',
        self::CODE_INVALID_PARAMS   => '无效参数',
        self::CODE_INVALID_PARAMS   => '系统错误',
        self::CODE_OK    => 'ok',
        self::CODE_NO_USER    => '用户不存在或密码错误',
    ];
}