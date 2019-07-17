<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Company;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use App\Models\Province;

class HomeController extends Controller
{

    public function index()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $receive = Order::historyDelivery();
        return view('index', [
            'customer' => $customer,
            'company' => $company,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function contact()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $receive = Order::historyDelivery();
        return view('contact', [
            'customer' => $customer,
            'company' => $company,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function price_list()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $receive = Order::historyDelivery();
        return view('price-list', [
            'customer' => $customer,
            'company' => $company,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function news()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $receive = Order::historyDelivery();
        return view('news', [
            'customer' => $customer,
            'company' => $company,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function new_detail()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $receive = Order::historyDelivery();
        return view('new-detail', [
            'customer' => $customer,
            'company' => $company,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function order()
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $order = Order::getList();
        $order_watting = Order::getList_Status(1);
        $order_no_delivery = Order::getList_Status(2);
        $order_beging_delivery = Order::getList_Status(3);
        $order_done_delivery = Order::getList_Status(4);
        $order_customer_cancel = Order::getList_Status(5);
        $order_iht_cancel = Order::getList_Status(6);
        $order_fail = Order::getList_Status(7);
        $receive = Order::historyDelivery();
        $sum_order = 0;
        foreach ($order as $item) {
            $sum_order += $item->total_price;
        }
        return view('order', [
            'customer' => $customer,
            'company' => $company,
            'order' => $order,
            'order_watting' => $order_watting,
            'order_no_delivery' => $order_no_delivery,
            'order_beging_delivery' => $order_beging_delivery,
            'order_done_delivery' => $order_done_delivery,
            'order_customer_cancel' => $order_customer_cancel,
            'order_iht_cancel' => $order_iht_cancel,
            'order_fail' => $order_fail,
            'sum_order' => $sum_order,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function order_search(Request $request)
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $order = Order::getListSearch($request);
        $order_watting = Order::getList_StatusSearch($request, 1);
        $order_no_delivery = Order::getList_StatusSearch($request, 2);
        $order_beging_delivery = Order::getList_StatusSearch($request, 3);
        $order_done_delivery = Order::getList_StatusSearch($request, 4);
        $order_customer_cancel = Order::getList_StatusSearch($request, 5);
        $order_iht_cancel = Order::getList_StatusSearch($request, 6);
        $order_fail = Order::getList_StatusSearch($request, 7);
        $receive = Order::historyDelivery();
        $sum_order = 0;
        foreach ($order as $item) {
            $sum_order += $item->total_price;
        }
        return view('order-search', [
            'customer' => $customer,
            'company' => $company,
            'order' => $order,
            'order_watting' => $order_watting,
            'order_no_delivery' => $order_no_delivery,
            'order_beging_delivery' => $order_beging_delivery,
            'order_done_delivery' => $order_done_delivery,
            'order_customer_cancel' => $order_customer_cancel,
            'order_iht_cancel' => $order_iht_cancel,
            'order_fail' => $order_fail,
            'sum_order' => $sum_order,
            'province' => $province,
            'receive' => $receive
        ]);
    }
    public function order_detail($id)
    {
        $province = Province::getList();
        $customer = Customer::getUserOfCustomer();
        $company = Company::listCompanyAll();
        $order = Order::detail($id);
        $receive = Order::historyDelivery();
        return view('order-detail', [
            'customer' => $customer,
            'company' => $company,
            'order' => $order,
            'province' => $province,
            'receive' => $receive
        ]);
    }

    public function arrayPaginator($array, $request)
    {
        $page = Input::get('page', 1);
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($array, $offset, $perPage, true),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }
}
