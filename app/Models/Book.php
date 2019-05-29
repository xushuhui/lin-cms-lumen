<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    public $hidden = ["created_at", "updated_at", "deleted_at"];
    public function getBookById($id)
    {
        return $this->where("id",$id)->get();
    }

}