<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts"; // for demonstration purposes
    public $timestamps = true; // automatically manage created_at and updated_at fields
}
