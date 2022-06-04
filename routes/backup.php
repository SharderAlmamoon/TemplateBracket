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
    Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('manage');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('update');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('delete');

});
// CATEGORY
Route::group(['prefix'=>'/category'],function(){
    Route::post('/catstore','App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
    Route::get('/forshow','App\Http\Controllers\Backend\CategoryController@show');
    Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
    Route::get('/catedit/{id}','App\Http\Controllers\Backend\CategoryController@edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy');

});