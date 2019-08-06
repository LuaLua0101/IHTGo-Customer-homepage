<?php

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::post('customer/update-fcm', 'ApiController@updateCustomerFCM');

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'driver'], function () {
    // Route::get('verify', 'ApiController@verify')->middleware(['can:delete-company2']);
    Route::get('verify', 'ApiController@verify');
    Route::get('logout', 'ApiController@logout');
    Route::post('update', 'ApiController@changeInfo');
    Route::post('change-passwd', 'ApiController@changePassword');
    Route::post('tracking', 'ApiController@tracking');

    Route::post('list-order', 'ApiController@loadOrders');
    Route::get('order-detail/{id?}', 'ApiController@detail');
    Route::get('order-start/{id?}', 'ApiController@startShipping');
    Route::get('order-finish/{id?}', 'ApiController@finishShipping');
    Route::post('update-fcm', 'ApiController@updateFCM');
    Route::post('get-order', 'ApiController@getOrder');
});

//raymond
Route::group(['middleware' => 'auth.jwt', 'prefix' => 'customer'], function () {
    Route::post('load-info-sender', 'ApiController@loadInfoSender');
    Route::post('load-info-receive', 'ApiController@loadInfoReceive');
});
