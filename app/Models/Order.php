<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order
{
    //danh sách đơn hàng
    public static function getList()
    {
        $user_id = Auth::user()->id;
        $res = DB::select("select od.sender_address,od.receive_address,o.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
        IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=$user_id");
        return $res;
    }
    //danh sách đơn hàng theo trạng thái đơn
    public static function getList_Status($status)
    {
        $user_id = Auth::user()->id;
        $res = DB::select("select od.sender_address,od.receive_address,o.*,
            IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
            IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
            IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
            IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
            IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
            FROM orders o, order_details od
            WHERE o.id=od.order_id AND o.user_id=$user_id AND o.status=$status");
        return $res;
    }

    //hiển thị tổng tiền đơn hàng theo trạng thái đơn
    public static function totalPrice($status)
    {
        if (Request::ajax()) {
            $res = self::getList_Status($status);
            
            return $res;
        }
    }
}
