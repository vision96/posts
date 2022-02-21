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
        try{
        $request->validate([
         'name'=>'required|max:100',
         'slug'=>'required|max:100'
        ]);

        category::create([
        'name'=>$request->name,
        'slug'=>$request->slug,
        ]);
        return response()->json(['success'=>'تمت الاضافة بنجاح']);

    }
    catch(\exception $ex){
        return response()->json(['error'=>'هناك خطا ما ,حاول لاحقا','err'=>$ex]);
    }
    
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
        $data = category::select('id','name','slug')->find($id);
        return view('admin.categories.editCategory',compact('data'));
    }

    public function updateCategory(request $request,$id){
    try{
       $data = category::select('id','name','slug')->find($id);
       
       $request->validate([
           'name'=>'required|max:100',
           'slug'=>'required|max:100',
        ]);  
  

    $data->name = $request->name;
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
