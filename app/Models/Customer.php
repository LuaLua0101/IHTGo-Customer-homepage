<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Auth;

class Customer
{
    //list district of province
    public static function addressOfCustomer()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;
            $res = DB::select(DB::raw("select c.address as ar
        FROM users u,customers c
        WHERE u.id=c.user_id AND u.id=$id"))[0];
            return $res;
        }
    }
}
