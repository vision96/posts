<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use DB;
use App\DataTables\categoryDatatable;
class CategoryyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(categoryDatatable $dtable)
    {
        return $dtable->render('admin.categories.viewCategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = category::findOrFail($id);
        return view('admin.categories.editCategory',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
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
