<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class User
{
    //hiển thị danh sách tỉnh/thành phố
    public static function editUser($data)
    {
        try {
            $user_id = Auth::user()->id;
            DB::table(config('constants.USER_TABLE'))
                ->where('id', $user_id)
                ->update([
                    'name' => isset($data->name) && $data->name !== "undefined"
                        && $data->name !== null ? $data->name : '',
                    'phone' => isset($data->phone)
                        && $data->phone !== "undefined"
                        && $data->phone !== null ? $data->phone : '',
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);
            return 200;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    //change password user
    public static function changePassword($data)
    {
        try {
            $current_password = Auth::user()->password;
            if (Hash::check($data->current_password, $current_password)) {
                $user_id = Auth::User()->id;
                DB::table(config('constants.USER_TABLE'))
                ->where('id', $user_id)
                ->update([
                    'password' => Hash::make($data->new_password),
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);
            } 
            return 200;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

}
