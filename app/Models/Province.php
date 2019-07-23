<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Province
{
    //hiển thị danh sách tỉnh/thành phố
    public static function getList()
    {
        $res = DB::table(config('constants.PROVINCE_TABLE'))->where('publish',1)->get();
        return $res;
    }

}
