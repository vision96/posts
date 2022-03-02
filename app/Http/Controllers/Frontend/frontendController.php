<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class frontendController extends Controller
{
    public function index()
    {
        $posts = Post::where('publish_status',1)->get();
        // {{$post->user->roles->name}}
        // foreach($posts as $post){
        //          dd($post->user()); 
        // }
        //$posts = Post::where('publish_status',1)->first();
    //    foreach($posts as $post) {
    //     dd($post->getMedia('media'));
    // }
       // $media = $posts->getMedia('media');
    //    foreach($posts as $post){
    //       dd($post->user()); 
    //    }
        return view('frontend.home',compact('posts'));
    }

}
   
