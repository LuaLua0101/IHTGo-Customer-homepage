<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Request;
class District
{
    //hiển thị danh sách quận/huyện theo id của tỉnh/thành phố
    public static function districtOfProvince($id)
    {
        if (Request::ajax()) {//còn thiếu điều kiện public
            $res = DB::table(config('constants.DISTRICT_TABLE'))->select('id', 'name as text')->where(['province_id' => $id])->get();
            return $res;
        }
    }

}
