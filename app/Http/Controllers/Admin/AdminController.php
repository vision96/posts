<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\socialLinks;
use App\Models\settings;

class AdminController extends Controller
{
    public function index(){
        return view('layouts.admin');
    }
    public function contact_us(){
        $contact_us =  ContactUs::select('id','name','email','subject','message','status')->paginate(10);
        return view('ContactUs',compact('contact_us'));

    }

    public function read($id){
        $read_all =  ContactUs::select('id','name','email','subject','message','status')->findOrFail($id);
        $read_all->status=1;
        $read_all->save();
        return view('read',compact('read_all'));

    }
    public function deleteContact(request $request){
        try{
         $delete = ContactUs::find($request->id);
      
         $delete->delete();
         return response()->json(['success'=>'تم الحذف بنجاح']);
        }
        catch(\exception $ex){
            return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);

        }
    }
    public function socialLinks(){
        $Media = socialLinks::all();
       return view('socialLinks',compact('Media'));
    }

    public function storeSocial(request $request){
        $data = socialLinks::all();
         foreach ($data as $d => $value) {
             $value->delete();
         }


        $request->validate([
            'link'=>'required|max:100',
           ]);
   
         
               foreach($request->icon as $I => $item){
                socialLinks::create([
                    'logo'=>$item,
                    'name'=>$request->name[$I],
                    'link'=>$request->link[$I],
                ]);
               }

              

           return response()->json(['success'=>'تمت الاضافة بنجاح']);
  
    // catch(\exception $ex){
    //     return response()->json(['error'=>'هناك خطا ما يرجى المحاولة لاحقا']);

    // }
}

public function settings(){
    $update = settings::select('siteName','siteAddress','email','phone','address','keywords','description')->find(1);
    return view('settings',compact('update'));
}

public function storeSettings(request $request){
    try{
  $settings=settings::find(1);
  $settings->siteName = $request->siteName;
  $settings->siteAddress = $request->siteAddress;
  $settings->email = $request->email;
  $settings->phone = $request->phone;
  $settings->address = $request->address;
  $settings->keywords = $request->keywords;
  $settings->description = $request->description;
  $settings->lat = $request->lat;
  $settings->lon = $request->lon;
  $settings->save();
  
  return response()->json(['success' => 'تم التحديث بنجاح']);

}
catch(\Exception $ex){
      return response()->json(['error' => ' هناك خطا ما حاول لاحقا ']);

}
}

}