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
    // 保有リスト編集
    Route::get('/', 'IndexController@index')->name('index');

    Route::get('add', 'IndexController@add')->name('add');
    Route::post('add', 'IndexController@create');

    Route::group(['middleware' => ['UserCheck']], function () {
        Route::get('edit/{id}', 'IndexController@edit')->name('edit');
        Route::post('edit/{id}', 'IndexController@update');

        Route::get('delete/{id}', 'IndexController@delete')->name('delete');
        Route::post('delete/{id}', 'IndexController@destroy');
    });

    // 仮想通貨種類編集
    Route::get('VC', 'VCController@VC')->name('VC');

    Route::get('addVC', 'VCController@addVC')->name('add.VC');
    Route::post('addVC', 'VCController@createVC');

    Route::group(['middleware' => ['UserCheckVC']], function() {
        Route::get('editVC/{id}', 'VCController@editVC')->name('edit.VC');
        Route::post('editVC/{id}', 'VCController@updateVC');

        Route::get('deleteVC/{id}', 'VCController@deleteVC')->name('delete.VC');
        Route::post('deleteVC/{id}', 'VCController@destroyVC');
    });
});
