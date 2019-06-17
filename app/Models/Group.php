<?php

namespace App\Models;

class Group extends BaseModel
{
    public function getGroupByName($name)
    {
        return $this->where("name",$name)->get();
    }
}