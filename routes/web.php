<?php
Route::get('/', 'HomeController@index');

Route::get('gioi-thieu', function () {
    return view('contact');
});
Route::get('bang-gia', function () {
    return view('price-list');
});
Route::get('tin-tuc', function () {
    return view('news');
});
Route::get('noi-dung', function () {
    return view('new-detail');
});
Route::get('don-hang', function () {
    return view('order');
});
Route::get('chi-tiet-don-hang', function () {
    return view('order-detail');
});