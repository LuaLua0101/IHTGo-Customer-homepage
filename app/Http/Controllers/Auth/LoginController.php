<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function postLogin(Request $request)
    {
        try {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $phone = $request->input('phone');
            $password = $request->input('password');
            if (Auth::attempt(['phone' => $phone, 'password' => $password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                if (Auth::user()->level == 3) {
                    return back()
                    ->with('success', 'Đăng nhập thành công!');
                }else{
                    Auth::logout();
                    return back()
                    ->with('error', 'Bạn không được phân quyền đăng nhập!');
                }
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                return back()
                ->with('error', 'Số điện thoại hoặc mật khẩu không đúng!');
            }
            
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
