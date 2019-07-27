<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        try {
            $res = Order::create($request);
            if ($res == 200) {
                return back()
                    ->with('success', 'Tạo mới đơn hàng thành công!');
            } else {
                return back()
                    ->with('error', 'Tạo mới đơn hàng thành công!');
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
    //load histoy
    public function loadHistoryDelivery($id)
    {
        try {
            $res = Order::loadHistoryDelivery($id);
            return $res;
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function printOrder($id)
    {
        $order = Order::detail($id);
        
        return view('print-order')->with('order', $order);;
    }
}
