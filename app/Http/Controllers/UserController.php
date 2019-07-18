<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser(Request $request)
    {
        try {
            $user = User::editUser($request);
            //nếu biến company_id tồn tài->khách hàng công ty
            if ($request->company_id) {
                $customer = Customer::editCustomer_Company($request);
            } else {
                $customer = Customer::editCustomer_Personal($request);
            }
            if ($user == 200 && $customer == 200) {
                return back()
                    ->with('success', 'Thay đổi thông tin thành viên thành công!');
            } else {
                return back()
                    ->with('error', 'Thay đổi thông tin thành viên thất bại!');
            }
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function changePassword(Request $request)
    {
        try {
            $res = User::changePassword($request);
            if ($res == 200) {
                return back()
                    ->with('success', 'Thay đổi mật khẩu thành viên thành công!');
            } else {
                return back()
                    ->with('error', 'Thay đổi mật khẩu thành viên thất bại!');
            }
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function checkExistPasswordCurrent($password)
    {
        return User::checkExistPasswordCurrent($password);
    }
}
