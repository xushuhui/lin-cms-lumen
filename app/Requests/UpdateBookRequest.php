<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
namespace App\Requests;

use App\Libraries\RequestValidate;

class UpdateBookRequest extends RequestValidate
{
    public $title;
    public $author;
    public $summary;
    public $image;
    public $id;
    public $data;
    public $rules = [
        'id'=>'required',
        'title'   => 'required|max:50',
        'author'  => 'required',
        'summary' => 'required',
        'image'   => 'required',
    ];

    public function load()
    {
        $this->id = $this->data['id'];
        $this->title   = $this->data['title'];
        $this->author  = $this->data['author'];
        $this->summary = $this->data['summary'];
        $this->image   = $this->data['image'];
    }
}
