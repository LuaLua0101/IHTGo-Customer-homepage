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
        WHERE o.id=od.order_id AND o.user_id=$user_id
        ORDER BY o.id DESC");
        return $res;
    }
    //danh sách đơn hàng search date
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
        WHERE o.id=od.order_id AND o.user_id=$user_id AND '$start_date' < o.created_at AND o.created_at < '$end_date'
        ORDER BY o.id DESC");
        return $res;
    }
    //danh sách chi tiết đơn hàng
    public static function detail($id)
    {
        $user_id = Auth::user()->id;
        $res = DB::select(DB::raw("select od.sender_address,od.receive_address,o.*,od.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
        IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type,
		IFNULL((SELECT u.name FROM  deliveries d, drivers dr,users u WHERE d.order_id=o.id AND d.driver_id=dr.id AND dr.user_id=u.id),'') as receive_shipper_name,
		IFNULL((SELECT u.phone FROM  deliveries d, drivers dr,users u WHERE d.order_id=o.id AND d.driver_id=dr.id AND dr.user_id=u.id),'') as receive__shipper_phone,
		IFNULL((SELECT c.number FROM deliveries d, cars c WHERE o.id=d.order_id AND d.car_id=c.id),'') as receive__shipper_car
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=  $user_id AND o.id=  $id
        ORDER BY o.id DESC"))[0];
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
            WHERE o.id=od.order_id AND o.user_id=$user_id AND o.status=$status
            ORDER BY o.id DESC");
        return $res;
    }
    //danh sách đơn hàng theo trạng thái đơn
    public static function getList_StatusSearch($data, $status)
    {
        try {
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
          WHERE o.id=od.order_id AND o.user_id=$user_id AND o.status=$status AND '$start_date' < o.created_at AND o.created_at < '$end_date' 
          ORDER BY o.id DESC");
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
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
    public static function totalPriceSearch($data, $status)
    {
        if (Request::ajax()) {
            $price = 0;
            $res = self::getList_StatusSearch($data, $status);
            foreach ($res as $r) {
                $price += $r->total_price;
            }
            return $price;
        }
    }

    //hiển thị tổng tiền đơn hàng theo trạng thái đơn
    public static function create($data)
    {
        try {

            $user_id = Auth::user()->id;
            $order_id = DB::table(config('constants.ORDER_TABLE'))->insertGetId(
                [
                    'name' => $data->name,
                    'code' => self::codeOrder(),
                    'car_type' => (int) $data->car_type,
                    'car_option' => (int) $data->car_option,
                    'status' => 1,
                    'payment_type' => (int) $data->payment_type,
                    'is_payment' => 0,
                    'user_id' => $user_id,
                    'payer' => (int) $data->payer,
                    'is_speed' => $data->is_speed,
                    'created_at' => date('Y-m-d h:i:s'),
                ]
            );
            $order_detail = DB::table(config('constants.ORDER_DETAIL_TABLE'))->insert(
                [
                    'order_id' => $order_id,
                    'sender_name' => $data->sender_name,
                    'sender_phone' => $data->sender_phone,
                    'sender_address' => $data->sender_address,
                    'receive_name' => $data->receive_name,
                    'receive_phone' => $data->receive_phone,
                    'receive_address' => $data->receive_address,
                    'note' => $data->note,
                    'sender_province_id' => $data->sender_province_id,
                    'sender_district_id' => $data->sender_district_id,
                    'receive_province_id' => $data->receive_province_id,
                    'receive_district_id' => $data->receive_district_id,
                    'take_money' => $data->take_money,
                    'weight' => $data->weight,
                ]
            );
            return 200;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    //tạo giá trị code đơn hàng
    public static function codeOrder()
    {
        $code = DB::select(DB::raw("select o.code 
            FROM orders o
            ORDER BY o.id DESC
            LIMIT 1"))[0];
        $date =   date('Ymd');
        $date_old = (string) substr($code->code, 3, -3);
        if ($date == $date_old) {
            $code = substr($code->code, 11);
            $code = ++$code;
            $code = date('Ymd') . '000' + $code;
            $res = 'IHT' . $code;
        } else {
            $res = 'IHT' . date('Ymd') . '001';
        }
        return $res;
    }
}
