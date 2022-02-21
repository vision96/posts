<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','body','image'
    ];
 
     public function categories()
    {
        return $this->belongsToMany(category::class,'post_categories');
    }
}