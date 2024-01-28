<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\PostController;
use App\Http\Controllers\Dashbord\UserController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Dashbord\PostsController;
use App\Http\Controllers\Dashbord\SettingController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Dashbord\CategoryControllerr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// website


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');




//Dashbord

Route::group(['prefix' => 'dashbord', 'as' => 'dashbord.', 'middleware' => ['auth', 'checklogin']], function () {
    Route::get('/', function () {
        return view('dashbord.layouts.layout');
    })->name('settings');

    Route::get('/settings', [SettingController::class , 'index'])->name('settings');
    Route::post('/settings/update/{setting}',[SettingController::class, 'update'])->name('settings.update');

    Route::get('/users/all',[UserController::class, 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete',[UserController::class, 'delete'])->name('users.delete');


    Route::get('/category/all',[CategoryControllerr::class, 'getUsersDatatable'])->name('category.all');
    Route::post('/category/delete',[CategoryControllerr::class, 'delete'])->name('category.delete');


    Route::get('/posts/all',[PostsController::class, 'gePostssDatatable'])->name('posts.all');
    Route::post('/posts/delete',[PostsController::class, 'delete'])->name('posts.delete');

    Route::resources([
        'users' => UserController::class,
        'category' => CategoryControllerr::class,
        'posts' => PostsController::class,


    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
