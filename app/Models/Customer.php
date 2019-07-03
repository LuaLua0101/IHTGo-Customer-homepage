<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Customer
{
    //hiển thị địa chỉ,loại khách hàng cá nhân or công ty của khách hàng(form thông tin cá nhân)
    public static function getUserOfCustomer()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;

            $res = DB::select("select c.address, c.type, c.company_id
        FROM users u,customers c
        WHERE u.id=c.user_id AND u.id=$id");
            if (count($res) == '0') {
                $res = null;
            } else {
                $res = $res[0];
            }
            return $res;
        }
    }
    //chỉnh sửa địa chỉ khách hàng cá nhân
    public static function editCustomer_Personal($data)
    {
        try {
            $user_id = Auth::user()->id;
            DB::table(config('constants.CUSTOMER_TABLE'))
                ->where('user_id', $user_id)
                ->update([
                    'company_id' => null,
                    'type' => 1,
                    'address' => $data->address,
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);
            return 200;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    //chỉnh sửa địa chỉ khách hàng công ty
    public static function editCustomer_Company($data)
    {
        try {
            $user_id = Auth::user()->id;
            //khách hàng chưa có code
            $code_check = DB::table(config('constants.CUSTOMER_TABLE'))->where('user_id', $user_id)->where('code', '!=', '')->first();
            if ($code_check) {
                DB::table(config('constants.CUSTOMER_TABLE'))
                    ->where('user_id', $user_id)
                    ->update([
                        'company_id' => $data->company_id,
                        'type' => 2,
                        'code' => self::codeCustomer(),
                        'address' => $data->address,
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);
            } else {
                DB::table(config('constants.CUSTOMER_TABLE'))
                    ->where('user_id', $user_id)
                    ->update([
                        'company_id' => $data->company_id,
                        'type' => 2,
                        'address' => $data->address,
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);
            }
            return 200;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    //tạo giá trị code của khách hàng công ty
    public static function codeCustomer()
    {
        $code = DB::select(DB::raw("select c.code
        FROM customers c
        WHERE c.code !=''
        ORDER BY c.id DESC
        LIMIT 1"))[0];
        $code = (int) substr($code->code, 14);
        $code = ++$code;
        $res = 'IHT-KH' . date('Ymd') . $code;
        return $res;
    }
}
