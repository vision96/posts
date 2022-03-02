<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\PostCategory;
use App\Models\Post;
use DB;
use Auth;
use App\DataTables\postDatatable;

class PostController extends Controller
{
    public function addPost()
    {
        $categories = category::get();
        return view('admin.posts.addPost', compact('categories'));
    }

    public function storePost(Request $request)
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


    //view datatable
    public function viewPosts(postDatatable $dtable)
    {
        return $dtable->render('admin.posts.viewPost');
    }

    public function dataTable()
    {
        return datatables()->of(DB::table('posts'))->toJson();
    }


    public function editPost($id, Post $post)
    {
        $data = Post::find($id);
        $categories = category::get();
        // $post_categories = PostCategory::where('post_id',$data->id)->get();
        // foreach($post_categories as $item){
        //     $categories = category::where('id',$item->category_id);
        // }
        return view('admin.posts.editPost', compact('data', 'categories'));
    }

    public function updatePost(request $request, $id)
    {
        try {
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
        } catch (\exception $ex) {
            return response()->json(['error', '  هناك خطا ما حاول لاحقا ']);
        }
    }


    public function deletePost(request $request)
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
