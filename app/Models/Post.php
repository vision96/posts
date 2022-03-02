<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable =[
        'title','body','publish_status','user_id'
    ];
 
     public function categories()
    {
        return $this->belongsToMany(category::class,'post_categories');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}