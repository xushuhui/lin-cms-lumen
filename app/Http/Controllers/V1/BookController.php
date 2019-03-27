<?php

namespace App\Http\Controllers\V1;

use App\Models\Book;
use App\Requests\Book\CreateBookRequest;
use Illuminate\Http\Request;
use App\Libraries\Response;

class BookController
{
    public function __construct()
    {
        $this->result = new Response();
        $this->request = new Request();
    }
    public function getBooks()
    {
        return [
            [
                "id"          => 1,
                "author"      => "西藏城",
                "create_time" => 1553587651000,
                "image"       => "test",
                "summary"     => "asf",
                "title"       => "asf",
            ],
            [
                "id"          => 1,
                "author"      => "西藏城",
                "create_time" => 1553587651000,
                "image"       => "test",
                "summary"     => "asf",
                "title"       => "asf",
            ]
        ];
    }

    public function getBook($id)
    {
        $data = Book::where('id',1)->get();
        return [
            "id"          => 1,
            "author"      => "西藏城",
            "create_time" => 1553587651000,
            "image"       => "test",
            "summary"     => "asf",
            "title"       => "asf",
        ];
    }

    public function createBook(CreateBookRequest $request)
    {
        $info = new CreateBookRequest();
        if($request->validates($this->request->all())){
            $result = $request->load($this->request->all());

        }else{
            $result =  $request->getLastError();
        }
        return $result;

        //dump($request->all());
        return [
            "error_code" => 0,
            "msg"        => "新建图书成功",
            "request"    => "POST  /v1/book/",
        ];
    }

    public function updateBook($id)
    {
        return [
            "error_code" => 0,
            "msg"        => "更新图书成功",
            "request"    => "PUT  /v1/book/139",
        ];
    }

    public function deleteBook($id)
    {
        return [
            "error_code" => 0,
            "msg"        => "删除图书成功",
            "request"    => "DELETE  /v1/book/139",
        ];
    }

    public function search()
    {
        # code...
    }

}
