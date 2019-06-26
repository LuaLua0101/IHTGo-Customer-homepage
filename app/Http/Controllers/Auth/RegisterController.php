<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'activated'=>'1',
        ]);
    }
    public function postRegister(Request $request)
    {    
        // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
        if ($this->create($request->all())) {
            // Insert thành công sẽ hiển thị thông báo
            Session::flash('success', 'Đăng ký thành viên thành công!');
            return redirect('/');
        } else {
            // Insert thất bại sẽ hiển thị thông báo lỗi
            Session::flash('error', 'Đăng ký thành viên thất bại!');
            return redirect('/');
        }
    }
}
