<?php
namespace App\Requests\Book;
use App\Requests\Request;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 11:55
 */
class CreateBookRequest extends Request
{
    public $rules = [
        'title' => 'required|max:50',
        'author' => 'required',
        'summary' => 'required',
        'image' => 'required',
    ];

}