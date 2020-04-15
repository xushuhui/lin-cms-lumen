<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Http\Controllers\api;

use App\Libs\RequestValidate;
use App\Requests\CreateBookRequest;
use App\Requests\UpdateBookRequest;
use App\Services\BookService;
use App\Libs\Response;

class BookController
{
    /**
     * @var BookService
     */
    private $service;

    public function __construct(BookService $bookService)
    {
        $this->service = $bookService;
    }
    public function getBooks()
    {
        return $this->service->getBooks();
    }

    public function getBook($id = 0)
    {
        if ($id == 0) {
            $validate = new RequestValidate();
            return $validate->error();
        }
        return $this->service->getBook($id);
    }

    public function createBook(CreateBookRequest $request)
    {
        return $this->service->createBook($request);
    }

    public function updateBook(UpdateBookRequest $request)
    {

        return  $this->service->updateBook($request);
    }

    public function deleteBook($id)
    {
        return $this->service->deleteBook($id);
    }

    public function search()
    {
        # code...
    }
}
