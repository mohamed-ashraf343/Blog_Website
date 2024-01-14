<?php

use App\Http\Controllers\Dashbord\SettingController;
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

Route::prefix('dashbord')->group(function () {
    Route::get('/settings', function () {
      return view('dashbord.settings');
        // Matches The "/admin/users" URL
    })->name('dashbord.settings');
    Route::post('/settings/update',[SettingController::class, 'update'])->name('dashbord.settings.update');
});

