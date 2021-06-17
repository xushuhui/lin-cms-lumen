<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Http\Controllers;

use App\Libs\RequestValidate;
use App\Libs\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
  
    public $response;
    public $validator;
    public function __construct(RequestValidate $validator,Response $response)
    {
        $this->response =$response;
        $this->validator = $validator;
    }
}
