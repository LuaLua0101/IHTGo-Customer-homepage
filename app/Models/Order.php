<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Request;

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
    //danh sách đơn hàng
    public static function detail($id)
    {
        $user_id = Auth::user()->id;
        $res = DB::select(DB::raw("select od.sender_address,od.receive_address,o.*,od.*,
          IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
          IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
          IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
          IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
          IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
          FROM orders o, order_details od
          WHERE o.id=od.order_id AND o.user_id=  $user_id AND o.id=  $id"))[0];
        // dd($res);
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
    public static function totalPriceAll()
    {
        if (Request::ajax()) {
            $price = 0;
            $res = self::getList();
            foreach ($res as $r) {
                $price += $r->total_price;
            }
            return $price;
        }
    }
    public static function totalPrice($status)
    {
        if (Request::ajax()) {
            $price = 0;
            $res = self::getList_Status($status);
            foreach ($res as $r) {
                $price += $r->total_price;
            }
            return $price;
        }
    }
    //hiển thị tổng tiền đơn hàng theo trạng thái đơn search date
    public static function totalPriceAllSearch($data)
    {
        if (Request::ajax()) {
            $price = 0;
            $res = self::getListSearch($data);
            foreach ($res as $r) {
                $price += $r->total_price;
            }
            return $price;
        }
    }
    public static function totalPriceSearch($data,$status)
    {
        if (Request::ajax()) {
            $price = 0;
            $res = self::getList_StatusSearch($data,$status);
            foreach ($res as $r) {
                $price += $r->total_price;
            }
            return $price;
        }
    }

    //danh sách đơn hàng
    public static function getListSearch($data)
    {
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $user_id = Auth::user()->id;
        $res = DB::select("select od.sender_address,od.receive_address,o.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
        IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=$user_id AND '$start_date' < o.created_at AND o.created_at < '$end_date'");
        return $res;
    }
    //danh sách đơn hàng theo trạng thái đơn
    public static function getList_StatusSearch($data, $status)
    {
        $user_id = Auth::user()->id;
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $res = DB::select("select od.sender_address,od.receive_address,o.*,
            IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
            IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
            IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
            IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
            IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
            FROM orders o, order_details od
            WHERE o.id=od.order_id AND o.user_id=$user_id AND o.status=$status AND '$start_date' < o.created_at AND o.created_at < '$end_date' ");
        return $res;
    }
}
