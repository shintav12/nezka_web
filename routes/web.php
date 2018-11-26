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

Route::get('/portofolio', 'PagesController@portofolio');

Route::get('/blog', 'PagesController@blog');

Route::get('clients/{slug}','PagesController@clients');

Route::get('who_you_are/{slug}','PagesController@whoyouare');

Route::get('projects/{slug}','PagesController@projects');

Route::post('who_you_are/save','PagesController@save')->name("save_who_your_area");