<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use DB;
use App\DataTables\categoryDatatable;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.categories.addCategory');
    }
    public function storeCategory(Request $request){
    // dd($request->all());
        //try{
        $request->validate([
         'name'=>'required|max:100',
         'description'=>'required|max:999',
         'slug'=>'required|max:100',
         'image'=>'mimes:jpeg,jpg,png,gif,webp|required|max:10000'
        ]);

        if($request->has('image')){
         $imageName=time().'.'.$request->image->extension();
         $request->image->move(public_path('image'),$imageName);
        }
        category::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'slug'=>$request->slug,
        'image'=>$imageName, 
        ]);
        return response()->json(['success'=>'تمت الاضافة بنجاح']);

    //}
    // catch(\exception $ex){
    //     return response()->json(['error'=>'هناك خطا ما ,حاول لاحقا','err'=>$ex]);
    // }
    
    }


    //view datatable
    public function viewCategories(categoryDatatable $dtable){
    //    $categories=category::select('name');
        return $dtable->render('admin.categories.viewCategory');
    }

    public function dataTable(){
        return datatables()->of(DB::table('categories'))->toJson();
    }


    public function editCategory($id){
        $data = category::select('id','name','description','slug','image')->find($id);
        return view('admin.categories.editCategory',compact('data'));
    }

    public function updateCategory(request $request,$id){
    try{
       $data = category::select('id','name','description','slug','image')->find($id);
       
       $request->validate([
           'name'=>'required|max:100',
           'slug'=>'required|max:100',
           'image'=>'nullable|sometimes|mimes:jpeg,jpg,png,gif,webp|max:10000' ]);  
  

    if($request->has('image')){
       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('image'),$imageName);
       if(file_exists(public_path('image/'.$data->image))){
           unlink(public_path('image/'.$data->image));
       }

       $data->image = $imageName;
    }

    $data->name = $request->name;
    $data->description = $request->description;
    $data->slug = $request->slug;
    $data->save();

    return response()->json(['success'=>'تم التحديث بنجاح']);
    }
    catch(\exception $ex){
        return response()->json(['error','  هناك خطا ما حاول لاحقا ']);
     }
   }

     
    public function deleteCategory(request $request){
        try{
         $delete = category::find($request->id);
      
         $delete->delete();
         return response()->json(['success'=>'تم الحذف بنجاح']);
        }
        catch(\exception $ex){
            return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);

        }
    }
}
