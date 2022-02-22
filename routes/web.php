<?php

use App\Http\Controllers\ImageController;
use App\Models\Category;
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


Route::get('/home', function () {
    $cat = Category::where('name', 'homepage')->with('images')->first();
    return view('pages.home', ['images' => $cat->images]);
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


Auth::routes();

Route::group(['middleware' => 'auth:web', 'prefix' => 'admin'], function () {
    Route::get('images', [ImageController::class, 'index']);
});
Route::view('fileManager', 'auth.images.fileManager');




/*Route::fallback(function () {
    return redirect('home');
});
*/