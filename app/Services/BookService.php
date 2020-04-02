<?php

/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Services;

use App\Libraries\CodeTable;
use App\Libraries\Response;
use App\Models\Book;
use App\Requests\Book\CreateBookRequest;
use App\Requests\Book\UpdateBookRequest;

class BookService
{
    public $result;

    public function __construct()
    {
        $this->result = new Response();
    }

    public function createBook(CreateBookRequest $request)
    {
        do {
            $model          = new Book();
            $model->title   = $request->title;
            $model->summary = $request->summary;
            $model->author  = $request->author;
            $model->image   = $request->image;
            if (!$model->save()) {
                $this->result->fail(CodeTable::SQL_ERROR);
                break;
            };
            $this->result->succeed();
        } while (false);
        return $this->result->toArray();
    }

    public function updateBook(UpdateBookRequest $request)
    {
        do {
            $model        = Book::find($request->id);
            $model->title = $request->title;
            $model->summary = $request->summary;
            $model->author  = $request->author;
            $model->image   = $request->image;
            if (!$model->save()) {
                $this->result->fail(CodeTable::SQL_ERROR);
                break;
            };
        } while (false);

        return $this->result->toArray();
    }

    public function deleteBook($id)
    {
        return $this->result->toArray();
    }

    public function getBook($id)
    {
        $model = new Book();
        $data  = $model->getBookById($id);
        $this->result->setData($data);
        return $this->result->toArray();
    }
    public function getBooks()
    {
        $data  = Book::all();
        $this->result->setData($data);
        return $this->result->toArray();
    }
}
