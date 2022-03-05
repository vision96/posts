<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\PostCategory;
use DB;
use Auth;
use App\DataTables\postDatatable;

class PosttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(postDatatable $dtable)
    {
        return $dtable->render('admin.posts.viewPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::get();
        return view('admin.posts.addPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:100',
                'body' => 'required|max:999',
                'image' => 'nullable|sometimes'
            ]);
            //'image'=>'mimes:jpeg,jpg,png,gif,webp|nullable|sometimes|max:10000'

            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::id(),
            ]);

            if ($request->has('image')) {
                $post->addMedia($request->image)->toMediaCollection('media');
            }

            foreach ($request->category as $key => $val) {
                PostCategory::create([
                    'post_id' => $post->id,
                    'category_id' => $val,
                ]);
            }

            return response()->json(['success' => 'تمت الاضافة بنجاح']);
        } catch (\exception $ex) {
            return response()->json(['error' => 'هناك خطا ما ,حاول لاحقا', 'err' => $ex]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::find($id);
        $categories = category::get();
        return view('admin.posts.editPost', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($id,$request->all());
       // try {
            $data = Post::findOrFail($id);

            $request->validate([
                'title' => 'required|max:100',
                'body' => 'required|max:999',
                'image' => 'nullable|sometimes'
            ]);

            //add the new one
            if ($request->has('image')) {
                
            //delete old media
            if($data->getMedia('media') != ''){
                $data->clearMediaCollection('media');
           }

                $data->addMedia($request->image)->toMediaCollection('media');
            }

            foreach ($request->category as $key => $val) {
                PostCategory::create([
                    'post_id' => $data->id,
                    'category_id' => $val,
                ]);
            }

            $data->title = $request->title;
            $data->body = $request->body;
            $data->save();

            return response()->json(['success' => 'تم التحديث بنجاح']);
        // } catch (\exception $ex) {
        //     return response()->json(['error', '  هناك خطا ما حاول لاحقا ']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $data = Post::find($request->id);
            //delete media first
            if($data->getMedia('media') != ''){
              $data->clearMediaCollection('media');
         }
          $data->delete();
          return response()->json(['success' => 'تم الحذف بنجاح']);
      } catch (\exception $ex) {
          return response()->json(['error' => 'هناك خطا ما يرجى المحاولة لاحقا']);
      }
    }

    public function publishPost($id)
    {
        $post = Post::findOrFail($id)->update(['publish_status' => 1]);
    }
}
