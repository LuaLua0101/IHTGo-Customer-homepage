<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        try {
            $res = Order::create($request);
            if ($res == 200) {
                Session::flash('success', 'Tạo mới đơn hàng thành công!');
                return redirect('/');
            } else {
                Session::flash('error', 'Tạo mới đơn hàng thất bại!');
                return redirect('/');
            }
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function totalPriceAll()
    {
        try {
            $res = Order::totalPriceAll();
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function totalPrice(Request $request)
    {
        try {
            $res = Order::totalPrice($request->id);
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    //trang search order date
    public function totalPriceAllSearch(Request $request)
    {
        try {
            $res = Order::totalPriceAllSearch($request);
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function totalPriceSearch(Request $request)
    {
        try {
            $res = Order::totalPriceSearch($request, $request->id);
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
