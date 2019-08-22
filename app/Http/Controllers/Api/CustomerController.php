<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    public function orderAll()
    {
        try {
            $data =  Customer::orderAll();
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Have not order',
            ], 401);
        }
    }
    public function orderWaiting()
    {
        try {
            $data =  Customer::orderWaiting();
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Have not order',
            ], 401);
        }
    }
    public function orderFinish()
    {
        try {
            $data =  Customer::orderFinish();
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Have not order',
            ], 401);
        }
    }
    public function orderCancel()
    {
        try {
            $data =  Customer::orderCancel();
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Have not order',
            ], 401);
        }
    }
    public function orderDetail($id)
    {
        try {
            $data =  Customer::orderDetail($id);
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Have not order',
            ], 401);
        }
    }
}
