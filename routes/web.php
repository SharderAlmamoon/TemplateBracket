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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| Our Custom Route
|--------------------------------------------------------------------------
*/
Route::group(['/admin'=>'prefix'],function(){
    Route::group(['prefix'=>'/product'],function(){
        Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->middleware(['auth'])->name('store');
        Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->middleware(['auth'])->name('create');
        Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->middleware(['auth'])->name('manage');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->middleware(['auth'])->name('edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->middleware(['auth'])->name('update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->middleware(['auth'])->name('delete');
    
    });
    // CATEGORY
    Route::group(['prefix'=>'/category'],function(){
        Route::post('/catstore','App\Http\Controllers\Backend\CategoryController@store')->middleware(['auth'])->name('category.store');
        Route::get('/forshow','App\Http\Controllers\Backend\CategoryController@show')->middleware(['auth']);
        Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->middleware(['auth'])->name('category.manage');
        Route::get('/catedit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->middleware(['auth']);
        Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->middleware(['auth']);
        Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->middleware(['auth']);
    
    });
});



require __DIR__.'/auth.php';
