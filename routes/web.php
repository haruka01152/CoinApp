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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::get('add', 'IndexController@add')->name('add');
    Route::post('add', 'IndexController@create');

    Route::get('addVC', 'IndexController@addVC')->name('add.VC');
    Route::post('addVC', 'IndexController@createVC');

    Route::group(['middleware' => ['UserCheck']], function () {
        Route::get('edit/{id}', 'IndexController@edit')->name('edit');
        Route::post('edit/{id}', 'IndexController@update');

        Route::get('delete/{id}', 'IndexController@delete')->name('delete');
        Route::post('delete/{id}', 'IndexController@destroy');
    });
});
