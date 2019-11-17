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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    //admin - inicio
    Route::prefix('admin')->group(function () {

        Route::get('item', 'ItemController@index')->name('item.index')->middleware('can:is_admin');
        Route::get('item/create', 'ItemController@create')->name('item.create')->middleware('can:is_admin');
        Route::post('item/create', 'ItemController@store')->name('item.store')->middleware('can:is_admin');
        Route::get('item/{id}', 'ItemController@show')->name('item.show')->middleware('can:is_admin');
        Route::get('item/{id}/edit', 'ItemController@edit')->name('item.edit')->middleware('can:is_admin');
        Route::put('item/{id}', 'ItemController@update')->name('item.update')->middleware('can:is_admin');
        Route::delete('item/{id}', 'ItemController@destroy')->name('item.destroy')->middleware('can:is_admin');

        Route::get('user', 'UserController@index')->name('user.index')->middleware('can:is_admin');//->middleware('permission:user-list|user-create|user-edit|user-delete');
        Route::get('user/create', 'UserController@create')->name('user.create')->middleware('can:is_admin');
        Route::post('user/create', 'UserController@store')->name('user.store')->middleware('can:is_admin');
        Route::get('user/{id}', 'UserController@show')->name('user.show')->middleware('can:is_admin');
        Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('can:is_admin');
        Route::put('user/{id}', 'UserController@update')->name('user.update')->middleware('can:is_admin');
        //Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('can:is_admin');

    });
    //admin - fim

    //todos - inicio
    Route::get('self_edit_password', 'UserController@self_edit_password')->name('self_edit_password');
    Route::put('self_update_password', 'UserController@self_update_password')->name('self_update_password');
    //todos - fim

    //cliente - inicio

    //cliente - fim

});