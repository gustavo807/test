<?php



Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{id}/edit', 'HomeController@edit');
Route::put('/users/{id}/update', 'HomeController@update');
Route::delete('/users/{id}/delete', 'HomeController@delete');


Route::get('/salespeople','ShowController@salespeople');
Route::get('/customers','ShowController@customers');
Route::get('/orders','ShowController@orders');
Route::get('/queries','ShowController@queries');



