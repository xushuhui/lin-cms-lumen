<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Models;

class Group extends BaseModel
{
    public function getGroupByName($name)
    {
        return $this->where("name",$name)->get();
    }
}