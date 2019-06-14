<?php

namespace App\Models;

class Book extends BaseModel
{
    
    public function getBookById($id)
    {
        return $this->where("id",$id)->get();
    }

}