<?php

use Illuminate\Http\Request;

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    // Route::get('verify', 'ApiController@verify')->middleware(['can:delete-company2']);
    Route::get('verify', 'ApiController@verify');
    Route::get('logout', 'ApiController@logout');
    Route::post('update', 'ApiController@changeInfo');
    Route::post('change-passwd', 'ApiController@changePassword');
    Route::post('tracking', 'ApiController@tracking');

    Route::post('list-order', 'ApiController@loadOrders');
    Route::get('order-detail/{id}', 'ApiController@detail');
    Route::get('order-start/{id}', 'ApiController@startShipping');
    Route::get('order-finish/{id}', 'ApiController@finishShipping');
    Route::post('update-fcm', 'ApiController@updateFCM');
});
