<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'status', 'show', 'image', 'gender'];

}
