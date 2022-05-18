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
    return view('backend.dashboard');
})->name('dashboard');



// Route::group(['prefix'=>'product'],function(){
//     Route::get('/store',function(){
//         return view
//     });
// });
Route::group(['prefix'=>'/product'],function(){

    Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('store');

    Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('create');
    


});