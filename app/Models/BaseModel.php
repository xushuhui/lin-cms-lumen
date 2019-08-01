<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $hidden = ["created_at", "updated_at", "deleted_at"];
    /**
  * 指定时间字符
  *
  * @param  DateTime|int  $value
  * @return string
  */
    public function fromDateTime($value)
    {
        return strtotime(parent::fromDateTime($value));
    }
}
