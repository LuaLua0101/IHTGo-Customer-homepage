<?php
use Illuminate\Support\Facades\Request;

// Sửa đường dẫn trang chủ mặc định

Route::get('/', 'HomeController@index');
// Đăng ký, đăng nhập, đăng xuất thành viên
Route::post('register', 'Auth\RegisterController@postRegister');
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@postLogout']);

// chỉnh sửa,thay đổi password thành viên
Route::post('edit-user', 'UserController@editUser');
Route::post('change-password', 'UserController@changePassword');
//thêm mới đơn hàng
Route::post('create-order', 'OrderController@create');
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
Route::get('total-price-order', 'OrderController@totalPrice');
