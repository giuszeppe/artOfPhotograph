<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Models\Category;
use App\Models\Raccolta;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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


Route::get('/home', [HomeController::class,'home'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/gallery',[HomeController::class,'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/services', [HomeController::class,'services'])->name('services');


Auth::routes();

Route::group(['middleware' => 'auth:web', 'prefix' => 'admin'], function () {
    Route::get('images', [ImageController::class, 'index']);
});
Route::view('fileManager', 'auth.images.fileManager')->middleware(['auth']);




Route::fallback(function () {
    return redirect('home');
});
