<?php

Route::post('login', 'ApiController@login');
Route::post('customer-login', 'ApiController@customerLogin');
Route::post('register', 'ApiController@register');

Route::post('customer/update-fcm', 'ApiController@updateCustomerFCM');
Route::get('driver/find', 'ApiController@findDriver');

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

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'customer'], function () {

    Route::get('logout', 'ApiController@logout');
    Route::post('order-detail/{id?}', 'Api\CustomerController@orderDetail');
    Route::post('order-all', 'Api\CustomerController@orderAll');
    Route::post('order-waiting', 'Api\CustomerController@orderWaiting');
    Route::post('order-finish', 'Api\CustomerController@orderFinish');
    Route::post('order-cancel', 'Api\CustomerController@orderCancel');

});
