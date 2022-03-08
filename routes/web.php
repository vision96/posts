<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\frontendController;
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

Route::get('/home', [App\Http\Controllers\Frontend\frontendController::class, 'index'])->name('home');
Auth::routes();
Route::view('calender','calender');

//admin group
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

        //resource will handle all methods
        Route::resource('post','App\Http\Controllers\Admin\PostController');

        Route::resource('post', 'App\Http\Controllers\Admin\PostController', ['only' => ['create', 'edit']])
        ->middleware('role:Admin,Writer');

        Route::resource('post', 'App\Http\Controllers\Admin\PostController', ['only' => ['destroy']])
        ->middleware('role:Admin');

        Route::post('/publishPost/{post}', [App\Http\Controllers\Admin\PostController::class, 'publishPost'])
        ->name('publishPost')->middleware('role:Admin');

        Route::resource('category','App\Http\Controllers\Admin\CategoryController');

        Route::resource('user','App\Http\Controllers\Admin\UserrController');
        
        Route::post('/addRoleUser/{id}', [App\Http\Controllers\Admin\UserrController::class, 'addRoleUser'])->name('addRoleUser');
        Route::get('/singleUser/{id}', [App\Http\Controllers\Admin\UserrController::class, 'singleUser'])->name('singleUser');
        Route::get('/DeleteUserRole/{id}', [App\Http\Controllers\Admin\UserrController::class, 'DeleteUserRole'])->name('DeleteUserRole');
        
        // ->middleware('role:Admin,Writer')
});

