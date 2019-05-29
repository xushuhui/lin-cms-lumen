<?php
namespace App\Requests\Book;

use App\Libraries\RequestValidate;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 11:55
 */
class CreateBookRequest extends RequestValidate
{
    public $title;
    public $author;
    public $summary;
    public $image;
    public $data;
    public $rules = [
        'title'   => 'required|max:50',
        'author'  => 'required',
        'summary' => 'required',
        'image'   => 'required',
    ];


    public function load()
    {

        $this->title   = $this->data['title'];
        $this->author  = $this->data['author'];
        $this->summary = $this->data['summary'];
        $this->image   = $this->data['image'];
        return true;
    }

}