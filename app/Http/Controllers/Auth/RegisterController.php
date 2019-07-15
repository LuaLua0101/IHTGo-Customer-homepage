<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use App\Models\Customer;
class RegisterController extends Controller
{

    protected function create(array $data)
    {
        //thêm thông tin khách hàng vào bảng user
        $res =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'activated' => '1',
        ]);
        //kiểm tra khách hàng thuộc cá nhân or công ty
        if ($data['company_id']) {
            //kh công ty
            $code=Customer::codeCustomer();          
            DB::table(config('constants.CUSTOMER_TABLE'))->insert(
                [
                    'user_id' => $res->id,
                    'type' => 2,
                    'code'=>$code,
                    'address'=>$data->address,
                    'company_id' => $data['company_id'],
                    'created_at' => date('Y-m-d h:i:s'),
                ]
            );
        }
        else{
            //kh cá nhân
            DB::table(config('constants.CUSTOMER_TABLE'))->insert(
                [
                    'user_id' => $res->id,
                    'type' => 1,
                    'address'=>$data->address,
                    'created_at' => date('Y-m-d h:i:s'),
                ]
            );
        }
        return $res;
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
