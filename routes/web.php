<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/panel', [App\Http\Controllers\HomeController::class, 'panel'])->name('panel');
Route::get('/search/search',[\App\Http\Controllers\HomeController::class,'search'])->name('search');

Route::group(['middleware' =>'auth'],function (){

    Route::resource('writers' ,\App\Http\Controllers\WriterController::class);
    Route::resource('books' ,\App\Http\Controllers\BookController::class);
    Route::resource('publishers' ,\App\Http\Controllers\PublisherController::class);
    Route::resource('translators' ,\App\Http\Controllers\TranslatorController::class);
    Route::resource('users' ,\App\Http\Controllers\UserController::class);

});
