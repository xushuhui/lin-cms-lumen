<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */

namespace App\Http\Controllers\V1;

use App\Libraries\RequestValidate;
use App\Requests\Book\CreateBookRequest;
use App\Requests\Book\UpdateBookRequest;
use App\Services\BookService;
use App\Libraries\Response;

class BookController
{
    public function __construct()
    {
        $this->service = new BookService();
    }
    public function getBooks()
    {
        $result =  $this->service->getBooks();
        return $result;
    }

    public function getBook($id = 0)
    {
        if ($id == 0) {
            $validate = new RequestValidate();
            return $validate->error();
        }
        $result =  $this->service->getBook($id);
        return $result;
    }

    public function createBook(CreateBookRequest $request)
    {

        if($request->validates() && $request->load()){
            $result =  $this->service->createBook($request);
        }else{
            $result =  $request->getLastError();
        }
        return $result;
    }

    public function updateBook(UpdateBookRequest $request)
    {

        if($request->validates() && $request->load()){
            $result =  $this->service->updateBook($request);
        }else{
            $result =  $request->getLastError();
        }
        return $result;
    }

    public function deleteBook($id)
    {
        if ($id == 0) {
            $validate = new RequestValidate();
            return $validate->error();
        }
        $result =  $this->service->deleteBook($id);
        return $result;
    }

    public function search()
    {
        # code...
    }

}
