<?php

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
/*
Route::get('/', function () {
    return view('pages.landing');
});*/

Route::get('/', 'PagesController@home');

Route::post('/contact_us/save','PagesController@SaveContact')->name('contact_save');

Route::get('/potafolio', 'PagesController@portafolio');

Route::get('/blog', 'PagesController@blog');

//Route::group(['prefix' => 'contact_us'], function (){
//    Route::get('/','BrandController@index')->middleware('verify_permissions')->name('brands');
//    Route::get('/get_types','BrandController@load')->name('get_brands');
//    Route::get('/detail/{id?}','BrandController@detail')->middleware('verify_permissions')->name('detail_brand');
//    Route::post('/save','BrandController@save')->name('brand_save');
//    Route::post('change_status','BrandController@change_status')->name('change_status_brand');
//});