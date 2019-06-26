<?php

// Sửa đường dẫn trang chủ mặc định
Route::get('/', function () {
    return view('index');
});
// Đăng ký thành viên
Route::post('register', 'Auth\RegisterController@postRegister');
// Đăng nhập và xử lý đăng nhập
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
// Đăng xuất
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@postLogout']);

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
