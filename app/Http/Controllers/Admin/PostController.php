<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\PostCategory;
use App\Models\Post;
use DB;
use App\DataTables\postDatatable;

class PostController extends Controller
{
    public function addPost(){
        $categories = category::get();
        return view('admin.posts.addPost',compact('categories'));
    }

    public function storePost(Request $request){
    
            try{
            $request->validate([
             'title'=>'required|max:100',
             'body'=>'required|max:999',
             'image'=>'mimes:jpeg,jpg,png,gif,webp|nullable|sometimes|max:10000'
            ]);
    
            $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            ]);

            //should use media libraray for image

            foreach($request->category as $key=>$val){
                PostCategory::create([
                    'post_id'=>$post->id,
                    'category_id'=>$val,
                ]);
            }
           
            return response()->json(['success'=>'تمت الاضافة بنجاح']);
    
        }
        catch(\exception $ex){
            return response()->json(['error'=>'هناك خطا ما ,حاول لاحقا','err'=>$ex]);
        }
        
        }

        
    //view datatable
    public function viewPosts(postDatatable $dtable){
            return $dtable->render('admin.posts.viewPost');
        }
    
        public function dataTable(){
            return datatables()->of(DB::table('posts'))->toJson();
        }
    
    
        public function editPost($id,Post $post){
            $data = Post::find($id);
            //dd($data->categories()->get());

            $categories = category::get();
            // $post_categories = PostCategory::where('post_id',$data->id)->get();
            // foreach($post_categories as $item){
            //     $categories = category::where('id',$item->category_id);
            // }
            return view('admin.posts.editPost',compact('data','categories'));
        }
    
        public function updatePost(request $request,$id){
        try{
           $data = Post::find($id);

           $request->validate([
             'title'=>'required|max:100',
             'body'=>'required|max:999',
             'image'=>'mimes:jpeg,jpg,png,gif,webp|nullable|sometimes|max:10000'
            ]);  
      
        //should use media libraray for image
        $data->title = $request->title;
        $data->body = $request->body;
        $data->save();
    
        return response()->json(['success'=>'تم التحديث بنجاح']);
        }
        catch(\exception $ex){
            return response()->json(['error','  هناك خطا ما حاول لاحقا ']);
         }
       }
    
         
        public function deletePost(request $request){
            try{
             $delete = Post::find($request->id);
          
             $delete->delete();
             return response()->json(['success'=>'تم الحذف بنجاح']);
            }
            catch(\exception $ex){
                return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);
    
            }
        }
}
