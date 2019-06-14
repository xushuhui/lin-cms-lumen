<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BaseModel extends Model
{
    public $hidden = ["created_at", "updated_at", "deleted_at"];
}