<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Services;

use App\Requests\CreateBookRequest;

interface BookService
{
    public function createBook(CreateBookRequest $request);
    public function getBooks();
    public function getBook();
    public function  updateBook();
    public function deleteBook();
}