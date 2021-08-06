<?php
Route::group(['prefix' => 'authenticate','namespace' => 'AuthAdmin'], function (){
    Route::get('login','LoginController@getLogin')->name('get.admin.login');
    Route::post('login','LoginController@postLogin');
    Route::get('logout','LoginController@logoutAdmin')->name('get.admin.logout');
});

Route::group(['prefix' => 'admin','namespace' => "Admin","middleware" => "checkLoginAdmin"], function (){
    Route::group(['prefix' => 'product'], function (){
        Route::get('/','AdminProductController@index')->name('admin.get.product.list');
        Route::get('/create','AdminProductController@create')->name('admin.get.product.create');
        Route::put('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.product.update');
        Route::put('/update/{id}','AdminProductController@update');
        Route::get('delete/{id}','AdminProductController@delete')->name('admin.get.product.delete');
    });
    Route::group(['prefix' => 'user'], function (){
        Route::get('/','AdminUserController@index')->name('admin.get.user.list');
        Route::post('/create','AdminUserController@create')->name('admin.get.user.create');
        Route::post('/update/{id}','AdminUserController@edit')->name('admin.get.user.update');
        Route::get('/delete/{id}','AdminUserController@delete')->name('admin.get.user.delete');
    });
    Route::group(['prefix' => 'bill'], function (){
        Route::get('/','AdminBillController@index')->name('admin.get.bill.list');
        Route::get('/delete/{id}','AdminBillController@delete')->name('admin.get.bill.delete');
    });
});