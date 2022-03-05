<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RoleUser;
use App\DataTables\AdminDatatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $dtable)
    {
        return $dtable->render('admin.users.viewUsers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
             'email'=>'required|max:100',
             'password'=>'required|max:100',
             'image'=>'mimes:jpeg,jpg,png,gif,webp|required|max:10000'
            ]);
    
            if($request->has('image')){
             $imageName=time().'.'.$request->image->extension();
             $request->image->move(public_path('image'),$imageName);
            }
            User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$imageName, 
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $users = User::findOrFail($request->id);
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
        //try{
            $users = User::findOrFail($request->id);
            
            $request->validate([
                'name'=>'required|max:100',
                'email'=>'required|max:100',
                'password'=>'required|max:100',
                'image'=>'nullable|sometimes|mimes:jpeg,jpg,png,gif,webp|max:10000' ]);  
       
     
         if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'),$imageName);
 
            if($users->image != null){
            if(file_exists(public_path('image/'.$users->image))){
                unlink(public_path('image/'.$users->image));
            }
            }
            $users->image = $imageName;
         }
     
         $users->name = $request->name;
         $users->email = $request->email;
         $users->password = Hash::make($request->password);
         $users->save();
     
         return response()->json(['success'=>'تم التحديث بنجاح']);
    //  }
    //  catch(\exception $ex){
    //      return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);
 
    //  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $delete = User::find($request->id);
            if(file_exists(public_path('image/'.$delete->image))){
               unlink(public_path('image/'.$delete->image));
           }
            $delete->delete();
            return response()->json(['success'=>'تم الحذف بنجاح']);
           }
           catch(\exception $ex){
               return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);
       
           }
    }

    public function addRoleUser(Request $request,$id){
        try {
            
            $user = User::findOrFail($id);
 
              $role_user = RoleUser::where('user_id',$user->id)->get();
                     if($role_user != null){
                     foreach($role_user as $role){
                         if($role->role_id == $request->role){
                             $role->delete();
                         }
                     }
                  }
 
             RoleUser::create([
                 'role_id' => $request->role,
                 'user_id' => $id,
             ]);
           
 
             return response()->json(['success' => 'تمت الاضافة بنجاح']);
         } catch (\exception $ex) {
             return response()->json(['error' => 'هناك خطا ما ,حاول لاحقا', 'err' => $ex]);
         }
 }
 
      public function singleUser($id){
         $user = User::findOrFail($id);
         $roles = Role::get();
         $user_roles = $user->roles;
         return view('admin.users.singleUser',compact('user','roles','user_roles'));
      }
 
      public function DeleteUserRole(Request $request,$id){
         // dd($request->all());
         $user = User::findOrFail($id);
         //$role_user = RoleUser::where('user_id',$user->id)->where('role_id',$request->id)->first();
         $role_user = RoleUser::where('user_id',$user->id)->get();
         foreach($role_user as $role){
             if($request->id == $role->role_id){
                 $role->delete();
             }
         }
      }
}
