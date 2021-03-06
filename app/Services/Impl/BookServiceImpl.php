<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */

namespace App\Services\Impl;

use App\Models\Book;
use App\Requests\CreateBookRequest;
use App\Requests\UpdateBookRequest;
use App\Services\BookService;

class BookServiceImpl implements BookService
{

    public function createBook(CreateBookRequest $request)
    {
        $model          = new Book();
        $model->title   = $request->title;
        $model->summary = $request->summary;
        $model->author  = $request->author;
        $model->image   = $request->image;
        return $model->save();
    }

    public function updateBook(UpdateBookRequest $request)
    {
        $model        = Book::find($request->id);
        $model->title = $request->title;
        $model->summary = $request->summary;
        $model->author  = $request->author;
        $model->image   = $request->image;
        return $model->save();
    }

    public function delete($id)
    {

    }

    public function getBook($id)
    {
        return Book::find($id);
    }
    public function getBooks()
    {
       return Book::all();
    }
}
