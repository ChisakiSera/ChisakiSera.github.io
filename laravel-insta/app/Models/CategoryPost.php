<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post';
    //  this is to tell the laravel that we are accessing the category_post table
    protected $fillable = ['category_id', 'post_id'];
    public $timestamps = false;

    # To get the name of the category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

