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

}