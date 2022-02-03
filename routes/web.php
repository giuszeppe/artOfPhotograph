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


Route::get('/home', function () {
    return view('pages.home');
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

Route::fallback(function () {
    return redirect('home');
});
