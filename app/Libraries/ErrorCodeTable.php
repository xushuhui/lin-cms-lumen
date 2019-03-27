<?php
namespace App\Libraries;
class ErrorCodeTable
{
    const CODE_INVALID_PARAMS          = -2;
    const CODE_SYSTEM_ERROR            = -1;
    const CODE_OK                      = 0;

    public static $table = [
        self::CODE_INVALID_PARAMS   => '无效参数',
        self::CODE_INVALID_PARAMS   => '系统错误',
        self::CODE_OK    => 'ok',
    ];
}