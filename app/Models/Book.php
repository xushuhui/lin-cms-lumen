<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    public $id;
    public $title;
    public $author;
    public $summary;
    public $image;
    public function getBookById($id)
    {
        return self::where("id",$id)->get();
    }
}