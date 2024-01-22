<?php

use App\Http\Controllers\Dashbord\CategoryControllerr;
use App\Http\Controllers\Dashbord\SettingController;
use App\Http\Controllers\Dashbord\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashbord.index');
});


Route::group(['prefix' => 'dashbord', 'as' => 'dashbord.', 'middleware' => ['auth', 'checklogin']], function () {
    Route::get('/', function () {
        return view('dashbord.layouts.layout');
    })->name('settings');

    Route::get('/settings', function () {
        return view('dashbord.settings');
    })->name('settings');


    Route::post('/settings/update/{setting}',[SettingController::class, 'update'])->name('settings.update');

    Route::get('/users/all',[UserController::class, 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete',[UserController::class, 'delete'])->name('users.delete');


    Route::get('/category/all',[CategoryControllerr::class, 'getUsersDatatable'])->name('category.all');
    Route::post('/category/delete',[CategoryControllerr::class, 'delete'])->name('category.delete');

    Route::resources([
        'users' => UserController::class,
        'category' => CategoryControllerr::class,

    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
