<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 21:23
 */

namespace App\Services;


use App\Libraries\ErrorCodeTable;
use App\Libraries\Response;
use App\Models\Book;
use App\Requests\Book\CreateBookRequest;
use App\Requests\Book\UpdateBookRequest;

class BookService
{
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
                $this->result->fail(ErrorCodeTable::CODE_SQL_ERROR);
                break;
            };
            $this->result->succeed();
        } while (false);
        return $this->result->toArray();
    }

    public function updateBook(UpdateBookRequest $request)
    {
        return $this->result->toArray();
    }

    public function deleteBook($id)
    {
        return $this->result->toArray();
    }

    public function getBook($id)
    {
        return $this->result->toArray();
    }


}