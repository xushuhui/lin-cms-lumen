<?php
namespace App\Requests\Book;

use App\Libraries\RequestValidate;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 11:55
 */
class UpdateBookRequest extends RequestValidate
{
    public $title;
    public $author;
    public $summary;
    public $image;
    public $rules = [
        'title'   => 'required|max:50',
        'author'  => 'required',
        'summary' => 'required',
        'image'   => 'required',
    ];

    public function load($data)
    {
        $this->title   = $data['title'];
        $this->author  = $data['author'];
        $this->summary = $data['summary'];
        $this->image   = $data['image'];
    }

}