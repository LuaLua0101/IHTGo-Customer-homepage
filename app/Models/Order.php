<?php

namespace App\Models;

use App\Http\Controllers\ImageController;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Request;

class Order extends Model
{
    protected $table = "orders";
    //list
    public static function getList()
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(10);
        return $res;
    }
    public static function getList_Status($status_id)
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->where('status', $status_id)->orderBy('created_at', 'DESC')->paginate(10);
        return $res;
    }
    //ajax load more
    public static function loadOrder($request)
    {
        if (Request::ajax()) {
            $user_id = Auth::user()->id;
            $output = '';
            $id = $request->id;
            $order = DB::table(config('constants.ORDER_TABLE'))->where('id', '>', $id)->where('user_id', $user_id)->orderBy('created_at', 'DESC')->limit(10)->get();
            if (!$order->isEmpty()) {
                foreach ($order as $o) {
                    //giao hỏa tốc
                    if ($o->is_speed == 1) {
                        $ispeed = '<i class="fas fa-rocket"></i>';
                    };
                    //trạng thái đơn hàng
                    if ($o->status == 1) {
                        $status = ' <span class="bage-warning">' . __('messages.waiting') . ' </span>';
                    } elseif ($o->status == 2) {
                        $status = ' <span class="bage-info">' . __('messages.no_delivery') . ' </span>';
                    } elseif ($o->status == 3) {
                        $status = ' <span class="bage-info">' . __('messages.being_delivery') . ' </span>';
                    } elseif ($o->status == 4) {
                        $status = ' <span class="bage-success">' . __('messages.succeeded') . ' </span>';
                    } elseif ($o->status == 5) {
                        $status = ' <span class="bage-basic">' . __('messages.customer_cancel') . ' </span>';
                    } elseif ($o->status == 6) {
                        $status = ' <span class="bage-basic">' . __('messages.iht_cancel') . ' </span>';
                    } elseif ($o->status == 7) {
                        $status = ' <span class="bage-danger">' . __('messages.unsuccessful') . ' </span>';
                    }
                    //Thanh toán
                    if ($o->is_payment == 0) {
                        $is_payment = ' <span class="bage-basic">' . __('messages.unpaid') . '</span>';
                    } elseif ($o->is_payment == 1) {
                        $is_payment = '<span class="bage-success"> ' . __('messages.paid') . '</span>';
                    } elseif ($o->is_payment == 2) {
                        $is_payment = '<span class="bage-danger">' . __('messages.debit') . '</span>';
                    }
                    //người thanh toán
                    if ($o->payer == 1) {
                        $payer = '<span class="bage-info">' . __("messages.receicer") . '</span>';
                    } else {
                        $payer = '<span class="bage-success">' . __("messages.sender") . ' </span>';
                    }
                    //trường hợp
                    if ($o->car_option == 1) {
                        $car_option = '<span class="bage-warning">' . __("messages.delivery_in_province") . ' </span>';
                    } elseif ($o->car_option == 2) {
                        $car_option = '<span class="bage-success">' . __("messages.delivery_of_documents") . '  </span>';
                    } elseif ($o->car_option == 3) {
                        $car_option = '<span class="bage-info">' . __("messages.delivery_outside_province") . ' </span>';
                    }
                    $output .= '
                <div class="row">
                <div class="col-md-2">
                    <img data-toggle="modal" data-target="#myModal" id="myImg" src="public/storage/order/' . $o->id . '_order.png?' . rand() . '"  alt="No Image" style="width:100%;max-width:300px;height:8em" onerror="this.onerror=null;this.src=`public//images//index//notfound.png`;">
                </div>
                <div class="col-md-3">
                    <p><a href="order-detail/id=' . $o->id . '">' . $ispeed . ' ' . $o->code . '</a></p>
                    <p class="text-justify">' . __("messages.order_name") . ': ' . $o->name . '</p>
                    <p class="text-justify">' . __("messages.date_created") . ': ' . date('d-m-Y', strtotime($o->created_at)) . '</p>
                </div>
                <div class="col-md-3 ">
                    <p>' . __("messages.payer") . ':' . $payer . ' </p>
                    <p>' . __("messages.pay") . ': ' . $is_payment . '</p>
                    <p>' . __("messages.total_money") . ': ' . number_format($o->total_price) . ' VNĐ' . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . __("messages.case") . ': ' . $car_option . '</p>
                    <p class="text-justify">' . __("messages.status") . ': ' . $status . '</p>
                </div>
            </div>
            <hr>
            ';
                }
                $output .= '
            <div id="remove-row" style="text-align: center;">
                <button id="btn-more" onclick="Loadmore(' . $o->id . ')" class="btn btn-default"> <i class="fas fa-chevron-down"></i> </button>
            </div>';
                return $output;
            }
        }
    }
    public static function loadOrder_Status($request)
    {
        if (Request::ajax()) {
            $user_id = Auth::user()->id;
            $output = '';
            $id = $request->id;
            $order = DB::table(config('constants.ORDER_TABLE'))->where('id', '>', $id)->where('user_id', $user_id)->where('status', $request->status)->orderBy('created_at', 'DESC')->limit(10)->get();
            if (!$order->isEmpty()) {
                foreach ($order as $o) {
                    //giao hỏa tốc
                    if ($o->is_speed == '1') {
                        $ispeed = '<i class="fas fa-rocket"></i>';
                    } else {
                        $ispeed = '';
                    };
                    //trạng thái đơn hàng
                    if ($o->status == 1) {
                        $status = ' <span class="bage-warning">' . __('messages.waiting') . ' </span>';
                    } elseif ($o->status == 2) {
                        $status = ' <span class="bage-info">' . __('messages.no_delivery') . ' </span>';
                    } elseif ($o->status == 3) {
                        $status = ' <span class="bage-info">' . __('messages.being_delivery') . ' </span>';
                    } elseif ($o->status == 4) {
                        $status = ' <span class="bage-success">' . __('messages.succeeded') . ' </span>';
                    } elseif ($o->status == 5) {
                        $status = ' <span class="bage-basic">' . __('messages.customer_cancel') . ' </span>';
                    } elseif ($o->status == 6) {
                        $status = ' <span class="bage-basic">' . __('messages.iht_cancel') . ' </span>';
                    } elseif ($o->status == 7) {
                        $status = ' <span class="bage-danger">' . __('messages.unsuccessful') . ' </span>';
                    }
                    //Thanh toán
                    if ($o->is_payment == 0) {
                        $is_payment = ' <span class="bage-basic">' . __('messages.unpaid') . '</span>';
                    } elseif ($o->is_payment == 1) {
                        $is_payment = '<span class="bage-success"> ' . __('messages.paid') . '</span>';
                    } elseif ($o->is_payment == 2) {
                        $is_payment = '<span class="bage-danger">' . __('messages.debit') . '</span>';
                    }
                    //người thanh toán
                    if ($o->payer == 1) {
                        $payer = '<span class="bage-info">' . __("messages.receicer") . '</span>';
                    } else {
                        $payer = '<span class="bage-success">' . __("messages.sender") . ' </span>';
                    }
                    //trường hợp
                    if ($o->car_option == 1) {
                        $car_option = '<span class="bage-warning">' . __("messages.delivery_in_province") . ' </span>';
                    } elseif ($o->car_option == 2) {
                        $car_option = '<span class="bage-success">' . __("messages.delivery_of_documents") . '  </span>';
                    } elseif ($o->car_option == 3) {
                        $car_option = '<span class="bage-info">' . __("messages.delivery_outside_province") . ' </span>';
                    }
                    $output .= '
                <div class="row">
                <div class="col-md-2">
                    <img data-toggle="modal" data-target="#myModal" id="myImg" src="../public/storage/order/' . $o->id . '_order.png?' . rand() . '"  alt="No Image" style="width:100%;max-width:300px;height:8em" onerror="this.onerror=null;this.src=`..//public//images//index//notfound.png`;">
                </div>
                <div class="col-md-3">
                    <p><a href="order-detail/id=' . $o->id . '">' . $ispeed . ' ' . $o->code . '</a></p>
                    <p class="text-justify">' . __("messages.order_name") . ': ' . $o->name . '</p>
                    <p class="text-justify">' . __("messages.date_created") . ': ' . date('d-m-Y', strtotime($o->created_at)) . '</p>
                </div>
                <div class="col-md-3 ">
                    <p>' . __("messages.payer") . ':' . $payer . ' </p>
                    <p>' . __("messages.pay") . ': ' . $is_payment . '</p>
                    <p>' . __("messages.total_money") . ': ' . number_format($o->total_price) . ' VNĐ' . '</p>
                </div>
                <div class="col-md-3">
                    <p>' . __("messages.case") . ': ' . $car_option . '</p>
                    <p class="text-justify">' . __("messages.status") . ': ' . $status . '</p>
                </div>
            </div>
            <hr>
            ';
                }
                $output .= '
            <div id="remove-row" style="text-align: center;">
                <button id="btn-more" onclick="Loadmore(' . $o->id . ')" class="btn btn-default"> <i class="fas fa-chevron-down"></i> </button>
            </div>';
                return $output;
            }
        }
    }
    //count
    public static function countList()
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->count();
        return $res;
    }
    public static function countList_Status($status_id)
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->where('status', $status_id)->count();
        return $res;
    }
    //sum
    public static function sumList()
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->sum('total_price');
        return $res;
    }
    public static function sumList_Status($status_id)
    {
        $user_id = Auth::user()->id;
        $res = DB::table(config('constants.ORDER_TABLE'))->where('user_id', $user_id)->where('status', $status_id)->sum('total_price');
        return $res;
    }
    //danh sách đơn hàng search date
    public static function getListSearch($data)
    {
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $user_id = Auth::user()->id;
        $res = self::paginateArray(
            $res = DB::select("select od.sender_address,od.receive_address,o.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=$user_id AND '$start_date' < o.created_at AND o.created_at < '$end_date'
        ORDER BY o.id DESC")
        );
        return $res;
    }
    //danh sách đơn hàng theo trạng thái đơn
    public static function getList_StatusSearch($data, $status)
    {
        try {
            $user_id = Auth::user()->id;
            $start_date = $data->start_date;
            $end_date = $data->end_date;
            $res = self::paginateArray(
                $res = DB::select("select od.sender_address,od.receive_address,o.*,
              IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
              IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
              IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
              IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name
              FROM orders o, order_details od
              WHERE o.id=od.order_id AND o.user_id=$user_id AND o.status=$status AND '$start_date' < o.created_at AND o.created_at < '$end_date'
              ORDER BY o.id DESC")
            );
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    //danh sách chi tiết đơn hàng
    public static function detail($id)
    {
        $user_id = Auth::user()->id;
        $res = DB::select(DB::raw("select od.sender_address,od.receive_address,o.*,od.*,o.id as order_id,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
		IFNULL((SELECT u.name FROM  deliveries d, drivers dr,users u WHERE d.order_id=o.id AND d.driver_id=dr.id AND dr.user_id=u.id),'') as receive_shipper_name,
		IFNULL((SELECT u.phone FROM  deliveries d, drivers dr,users u WHERE d.order_id=o.id AND d.driver_id=dr.id AND dr.user_id=u.id),'') as receive__shipper_phone,
		IFNULL((SELECT c.number FROM deliveries d, cars c WHERE o.id=d.order_id AND d.car_id=c.id),'') as receive__shipper_car
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=  $user_id AND o.id=  $id
        ORDER BY o.id DESC"))[0];
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
            $ship_money = 0;
            $car_option = 0;
            $is_speed = 0;
            $length = ($data->length > 1 || $data->length != null) ? $data->length : 1;
            $width = ($data->width > 1 || $data->width != null) ? $data->width : 1;
            $height = ($data->height > 1 || $data->height != null) ? $data->height : 1;
            $weight = ($data->weight > 1 || $data->weight != null) ? $data->weight : 1;
            $size = ($length * $width * $height) / 5000;

            //delivery_of_documents 
            $district = District::findDistrict($data->receive_district_id);
            if ($data->car_option == '2') {
                $car_option = 2;
                if ($district->publish_2 == 1) {
                    $ship_money = 70000;
                } else {
                    $ship_money = 140000;
                }
            } else {
                $delivery_in_province = 70000;
                $delivery_outside_province = 140000;
                //delivery_in_province
                if ($data->sender_province_id == $data->receive_province_id) {
                    $car_option = 1;
                    if ($weight > 25) {
                        $ship_money = ($weight * 3000) + $delivery_in_province;
                    } else {
                        if ($size < 25 || $size == 25) {
                            $ship_money = $delivery_in_province;
                        } else {
                            $ship_money = ($size * 3) + $delivery_in_province;
                        }
                    }
                }
                //delivery_outside_province
                if ($data->sender_province_id != $data->receive_province_id) {
                    $car_option = 3;
                    if ($weight > 25) {
                        $ship_money = ($weight * 3000) + $delivery_outside_province;
                    } else {
                        if ($size < 25 || $size == 25) {
                            $ship_money = $delivery_outside_province;
                        } else {
                            $ship_money = ($size * 3) + $delivery_outside_province;
                        }
                    }
                }
            }
            if ($data->is_speed == '1') {
                $is_speed = 1;
                $ship_money = $ship_money * 2;
            }
            $order_id = DB::table(config('constants.ORDER_TABLE'))->insertGetId(
                [
                    'name' => $data->name,
                    'code' => self::codeOrder(),
                    'car_option' => $car_option,
                    'status' => 1,
                    'is_payment' => 0,
                    'user_id' => $user_id,
                    'payer' => (int) $data->payer,
                    'is_speed' => $is_speed,
                    'created_at' => date('Y-m-d h:i:s'),
                    'car_type' => 8,
                    'payment_type' => isset($data->payment_type)
                        && $data->payment_type !== "undefined"
                        && $data->payment_type !== null ? $data->payment_type : '1',
                    'total_price' => $ship_money,
                ]
            );
            DB::table(config('constants.ORDER_DETAIL_TABLE'))->insert(
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
                    'length' => $data->length,
                    'width' => $data->width,
                    'height' => $data->height,
                ]
            );
            ImageController::uploadImageOrder($data, $order_id);
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
        $date = date('Ymd');
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

    //lịch sử thông tin người nhận
    public static function historyDelivery()
    {
        $res = DB::select("select od.id,od.receive_name,od.receive_phone,od.receive_address,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name
        FROM orders o, order_details od
        WHERE o.id=od.order_id
        ORDER BY o.id DESC
        LIMIT 10");
        return $res;
    }
    //load lịch sử thông tin người nhận
    public static function loadHistoryDelivery($id)
    {
        if (Request::ajax()) {
            $res = DB::table(config('constants.ORDER_DETAIL_TABLE'))->where('id', $id)->get();
            return $res;
        }
    }

    //NAD
    public static function orderDetail($id)
    {
        $res = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.id', $id)
            ->first();
        return $res;
    }

    public static function getAllOrderByDriver($id, $page)
    {
        $res = DB::table('orders')
            ->join('deliveries', 'orders.id', '=', 'deliveries.order_id')
            ->where('deliveries.driver_id', $id)
            ->where(function ($query) {
                $query->where('orders.status', '2')
                    ->orWhere('orders.status', '3')
                    ->orWhere('orders.status', '4');
            })
            ->skip($page)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get(['orders.id', 'orders.name', 'orders.status', 'orders.total_price', 'orders.is_speed', 'orders.car_option', 'orders.created_at']);
        return $res;
    }

    public static function getOrderById($id)
    {
        $res = DB::table('orders')
            ->where('id', $id)
            ->first(['id', 'name', 'status', 'total_price', 'is_speed', 'car_option', 'created_at']);
        return $res;
    }

    public static function getPendingOrderByDriver($id, $page)
    {
        $res = DB::table('orders')
            ->join('deliveries', 'orders.id', '=', 'deliveries.order_id')
            ->where('deliveries.driver_id', $id)
            ->where(function ($query) {
                $query->where('orders.status', '2')
                    ->orWhere('orders.status', '3');
            })
            ->skip($page)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get(['orders.id', 'orders.name', 'orders.status', 'orders.total_price', 'orders.is_speed', 'orders.car_option', 'orders.created_at']);
        return $res;
    }

    public static function getFinishOrderByDriver($id, $page)
    {
        $res = DB::table('orders')
            ->join('deliveries', 'orders.id', '=', 'deliveries.order_id')
            ->where('deliveries.driver_id', $id)
            ->where('orders.status', '4')
            ->skip($page)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get(['orders.id', 'orders.name', 'orders.status', 'orders.total_price', 'orders.is_speed', 'orders.car_option', 'orders.created_at']);
        return $res;
    }
    //====================
}
