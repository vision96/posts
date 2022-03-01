<?php

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

Route::get('/home', [App\Http\Controllers\Frontend\frontendController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin group
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

        //start user
        Route::get('/viewUsers', [App\Http\Controllers\Admin\UserController::class, 'viewUsers'])->name('viewUsers');
        Route::post('/DeleteUser', [App\Http\Controllers\Admin\UserController::class, 'DeleteUser'])->name('DeleteUser');
        Route::post('/StoreUser', [App\Http\Controllers\Admin\UserController::class, 'StoreUser'])->name('StoreUser');
        Route::post('/editUser', [App\Http\Controllers\Admin\UserController::class, 'editUser'])->name('editUser');
        Route::post('/updateUser', [App\Http\Controllers\Admin\UserController::class, 'updateUser'])->name('updateUser');
        Route::post('/addRoleUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'addRoleUser'])->name('addRoleUser');
        Route::get('/singleUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'singleUser'])->name('singleUser');
        //start user
        
         //start role
         Route::post('/storeRole', [App\Http\Controllers\Admin\RoleController::class, 'storeRole'])->name('storeRole');
         Route::get('/viewRoles', [App\Http\Controllers\Admin\RoleController::class, 'viewRoles'])->name('viewRoles');
         Route::post('/editRole', [App\Http\Controllers\Admin\RoleController::class, 'editRole'])->name('editRole');
         Route::post('/updateRole', [App\Http\Controllers\Admin\RoleController::class, 'updateRole'])->name('updateRole');
         Route::post('/deleteRole', [App\Http\Controllers\Admin\RoleController::class, 'deleteRole'])->name('deleteRole');
         //end role

        //start category
        Route::get('/addCategory', [App\Http\Controllers\Admin\CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('/storeCategory', [App\Http\Controllers\Admin\CategoryController::class, 'storeCategory'])->name('storeCategory');
        Route::get('/viewCategories', [App\Http\Controllers\Admin\CategoryController::class, 'viewCategories'])->name('viewCategories');
        Route::post('/dataTable', [App\Http\Controllers\Admin\CategoryController::class, 'dataTable'])->name('dataTable');
        Route::get('/editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('editCategory');
        Route::post('/updateCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::post('/deleteCategory', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        //end category
    
        //start posts
        Route::get('/addPost', [App\Http\Controllers\Admin\PostController::class, 'addPost'])->name('addPost');
        Route::post('/storePost', [App\Http\Controllers\Admin\PostController::class, 'storePost'])->name('storePost');
        Route::get('/viewPosts', [App\Http\Controllers\Admin\PostController::class, 'viewPosts'])->name('viewPosts');
        Route::post('/dataTable2', [App\Http\Controllers\Admin\PostController::class, 'dataTable2'])->name('dataTable2');
        Route::get('/editPost/{id}', [App\Http\Controllers\Admin\PostController::class, 'editPost'])->name('editPost');
        Route::post('/updatePost/{id}', [App\Http\Controllers\Admin\PostController::class, 'updatePost'])->name('updatePost');
        Route::post('/deletePost', [App\Http\Controllers\Admin\PostController::class, 'deletePost'])->name('deletePost');
        Route::get('/search', [App\Http\Controllers\Admin\PostController::class, 'search'])->name('search');
        //end posts
});

