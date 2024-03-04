<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});

//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/show/{product}', [ProductController::class, 'show'])->name('show');
Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/edit', [ProductController::class, 'update'])->name('update');
Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
// Route::get('/', 'ProductController@index')->name('index');
// Route::get('/create', 'ProductController@create')->name('create');
// Route::post('store/', 'ProductController@store')->name('store');
// Route::get('show/{product}', 'ProductController@show')->name('show');
// Route::get('edit/{product}', 'ProductController@edit')->name('edit');
// Route::put('edit/{product}','ProductController@update')->name('update');
// Route::delete('/{product}','ProductController@destroy')->name('destroy');
