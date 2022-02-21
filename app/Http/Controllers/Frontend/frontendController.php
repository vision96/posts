<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subCategory;
use App\Models\product;
use App\Models\image;
use App\Models\settings;
use App\Models\order;
use App\Models\ContactUs;
use App\Models\advertisments;
use App\Models\reviews;
use Carbon\Carbon;


class frontendController extends Controller
{
    public function index()
    {
        $data = category::select('id','name','description','slug','image')->get();
        $data2 = product::select('id','name','description','price','discount','discount_from','discount_to','subcategory_id')->whereNotNull('discount')->get();
        $data3 = subCategory::select('id','name','image')->get();
        $settings = settings::select('address','phone','email','lat','lon')->find(1);
        $advertise = advertisments::select('id','slug','image')->find(1);
        return view('frontend.home',compact('data','data2','data3','settings','advertise'));
    }

    public function category($id)
    {
        $data = category::select('id','name','description','slug','image')->find($id);
        $advertise = advertisments::select('id','slug','image')->find(1);
        $data3 = $data->subCategories()->get();
        $settings = settings::select('address','phone','email','lat','lon')->find(1);

        // $data2 = $data->subCategories()->with('Products')->get();
        $data2 = product::with('subCategory')->whereHas('subCategory',function($q) use($id){

        return $q->where('category_id',$id);
        })->whereNotNull('discount')->get();

        
        // dd($product);
        return view('frontend.category',compact('data','data3','data2','settings','advertise'));
    }

    public function Wproducts($id){

         if(isset($_GET['desc'])){
            $desc = $_GET['desc'];
            $data = subCategory::select('id','name','image')->find($id);
            if ($desc=='higher'){
                $data2 = $data->Products()->orderBy('price',$desc)->get();
            }
            if ($desc=='lower'){
                $data2 = $data->Products()->orderBy('price','asc')->get();
            }

         }

         else{
            $data = subCategory::select('id','name','image','category_id')->find($id);
            $data2 = $data->Products()->orderBy('id','desc')->get();
            $settings = settings::select('address','phone','email','lat','lon')->find(1);

         }

        return view('frontend.Wproducts',compact('data','data2','settings')); 
    }

    public function layout(){
        $data = category::select('id','name','description','slug','image')->get();
        $settings = settings::select('address','phone','email','lat','lon')->find(1);
        //$data2 = $data->subCategories()->select('id','name','image','category_id')->get();
        return view('frontend.layout',compact('data','settings')); 
    }

    public function SingleProduct($id){
        $data = product::select('id','name','description','price','discount','discount_from','discount_to','subcategory_id')->find($id);
        $settings = settings::select('address','phone','email','lat','lon')->find(1);
        $reviews = reviews::select('name','email','reviews','created_at')->first();
        return view('frontend.singleProductt',compact('data','settings','reviews')); 
    }

    public function ContactUs(){
        $settings = settings::select('address','phone','email','lat','lon')->find(1);
        return view('frontend.contactUs',compact('settings'));
    }

    public function store_ContactUs(request $request){
        try{
            $request->validate([
                'name'=>'required|max:100',
                 'email'=>'required|max:100',
                 'subject'=>'required|max:100',
                 'message'=>'required|max:999',

              ]);

              ContactUs::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'subject'=>$request->subject,
              'message'=>$request->message,
              ]);

              return response()->json(['success'=>'your message has been sent! thank you']);

        }

        catch(\exception $ex){
            return response()->json(['error'=>'Ajax request not submitted'],400);

       }
    }

    public function store_order(request $request){
        //try{
         
            $request->validate([
                'name'=>'required|max:100',
                 'phone'=>'required|max:100',
                 'email'=>'required|max:100',
                 'address'=>'required|max:100',
                 'quantity'=>'required|max:100',
                 'productId'=>'required|max:100',
              ]);

              order::create([
              'name'=>$request->name,
              'phone'=>$request->phone,
              'email'=>$request->email,
              'address'=>$request->address,
              'quantity'=>$request->quantity,
              'product_id'=>$request->productId,

              ]);

              return response()->json(['success'=>'your order has been sent! thank you']);

       // }

    //     catch(\exception $ex){
    //         return response()->json(['error'=>'Ajax request not submitted'],400);

    //    }
    }

    public function reviews(request $request){
        try{
            
            $request->validate([
                'name'=>'required|max:100',
                 'email'=>'required|max:100',
                 'review'=>'required|max:999',


              ]);

              reviews::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'reviews'=>$request->review,
              ]);

              return response()->json(['success'=>'your message has been sent! thank you']);

         }

        catch(\exception $ex){
             return response()->json(['error'=>'Ajax request not submitted'],400);

        }
    }

    }
   
