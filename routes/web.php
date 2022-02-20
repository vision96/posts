<?php
use App\Http\controllers\HomeController;
use App\Http\controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home/{name}',[HomeController::class,'index'])->name('home.index');

Route::get('/user',[UserController::class,'index'])->name('user.index');
