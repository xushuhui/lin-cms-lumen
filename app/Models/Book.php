<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    public function getBookById($id)
    {
        return self::where("id",$id)->get();
    }
}