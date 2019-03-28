<?php

namespace App\Http\Controllers\V1;

use App\Libraries\RequestValidate;
use App\Requests\Book\CreateBookRequest;
use App\Requests\Book\UpdateBookRequest;
use App\Services\BookService;
use Illuminate\Http\Request;
use App\Libraries\Response;

class BookController
{
    public function __construct()
    {
        $this->result = new Response();
        $this->request = new Request();
        $this->service = new BookService();
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

    public function getBook($id = 0)
    {
        if ($id == 0) {
            $validate = new RequestValidate();
            return $validate->error();
        }
        $result =  $this->service->getBook($id);
        return $result;
//        return [
//            "id"          => 1,
//            "author"      => "西藏城",
//            "create_time" => 1553587651000,
//            "image"       => "test",
//            "summary"     => "asf",
//            "title"       => "asf",
//        ];
    }

    public function createBook(CreateBookRequest $request)
    {
        if($request->validates($this->request->all())){
            $info = $request->load($this->request->all());
            $result =  $this->service->createBook($info);
        }else{
            $result =  $request->getLastError();
        }
        return $result;
    }

    public function updateBook(UpdateBookRequest $request)
    {
        if($request->validates($this->request->all())){
            $info = $request->load($this->request->all());
            $result =  $this->service->updateBook($info);
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
