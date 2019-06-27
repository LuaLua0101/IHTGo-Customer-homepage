<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class HomeController extends Controller
{

    public function index()
    {
        $address = Customer::addressOfCustomer();
        return view('index', ['address' => $address]);
    }
    public function contact()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
    public function price_list()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
    public function news()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
    public function new_detail()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
    public function order()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
    public function order_detail()
    {
        $address = Customer::addressOfCustomer();
        return view('order', ['address' => $address]);
    }
}
