<?php
use Illuminate\Support\Facades\Request;

// Sửa đường dẫn trang chủ mặc định

Route::get('/', 'HomeController@index');
// Đăng ký thành viên
Route::post('register', 'Auth\RegisterController@postRegister');
// Đăng nhập và xử lý đăng nhập
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
// Đăng xuất
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@postLogout']);

//trang hiển thị
Route::get('gioi-thieu', 'HomeController@contact');
Route::get('bang-gia', 'HomeController@price_list');
Route::get('tin-tuc', 'HomeController@news');
Route::get('noi-dung', 'HomeController@new_detail');
Route::get('don-hang', 'HomeController@order');
Route::get('chi-tiet-don-hang', 'HomeController@order_detail');


//hiển thị danh sách  (AJAX)
Route::get('districtOfProvince/{province_id?}', 'DistrictController@districtOfProvince');
Route::get('listCompany', 'CompanyController@listCompany');
