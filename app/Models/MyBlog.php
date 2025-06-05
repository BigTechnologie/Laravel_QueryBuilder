<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // J'ai rajouté
use Illuminate\Database\Eloquent\Model;

class MyBlog extends Model
{
    //
    use HasFactory; // J'ai rajouté
    protected $table = 'blogs';
}
