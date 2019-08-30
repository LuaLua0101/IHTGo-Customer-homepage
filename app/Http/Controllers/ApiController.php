<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\District;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Customer;

class ApiController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
        try{
            dd($request);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            //thêm thông tin khách hàng vào bảng user
            $res =   DB::table(config('constants.USER_TABLE'))->insertGetId(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => Hash::make($request['password']),
                    'activated' => '1',
                    'created_at' => date('Y-m-d h:i:s'),
                ]
            );
            //kiểm tra khách hàng thuộc cá nhân or công ty
            if ($request['type']==2) {
                //kh công ty
                $code = Customer::codeCustomer();
                DB::table(config('constants.CUSTOMER_TABLE'))->insert(
                    [
                        'user_id' => $res,
                        'type' => 2,
                        'code' => $code,
                        'address' => $request->address,
                        'company_id' => $request['company_id'],
                        'created_at' => date('Y-m-d h:i:s'),
                    ]
                );
            } else {
                //kh cá nhân
                DB::table(config('constants.CUSTOMER_TABLE'))->insert(
                    [
                        'user_id' => $res,
                        'type' => 1,
                        'address' => $request->address,
                        'created_at' => date('Y-m-d h:i:s'),
                    ]
                );
            }

            return response()->json([
                'success' => true,
                'data' => $user,
            ], 200);
        }catch (Exception $e) {
                return response()->json('fail', 500);
        }
    }
    public function login(Request $request)
    {

        $this->validate($request, [
            'phone' => 'required|max:255',
            'password' => 'required',
        ]);
        $input = $request->only('phone', 'password');
        $jwt_token = null;

        try {
            if (!$jwt_token = JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Phone or Password',
                ], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }

        $user_level = Auth::user()->level;
        $user = Auth::user();

        if ($user_level == 4) {
            return response()->json([
                'token' => 'Bearer ' . $jwt_token,
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Phone or Password',
            ], 401);
        }
    }
    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|max:255',
            'password' => 'required',
        ]);
        $input = $request->only('phone', 'password');

        $jwt_token = null;

        try {
            if (!$jwt_token = JWTAuth::attempt($input)) {

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Phone or Password',
                ], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }
        $user_level = Auth::user()->level;
        $user = Auth::user();

        if ($user_level == 3) {
            return response()->json([
                'token' => 'Bearer ' . $jwt_token,
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Phone or Password',
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully',
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out',
            ], 500);
        }
    }

    public function verify()
    {
        $user = Auth::user();

        return response()->json([
            'code' => Response::HTTP_OK,
            'token' => 'Bearer ' . JWTAuth::getToken(),
            'id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
        ]);
    }
    public function searchAll(Request $req)
    {
        $res=Order::searchAll($req->search);

        return response()->json($res);
    }
    public function searchWaiting(Request $req)
    {
        $res=Order::searchWaiting($req->search);

        return response()->json($res);
    }
    public function searchFinished(Request $req)
    {
        $res=Order::searchFinished($req->search);

        return response()->json($res);
    }
    public function searchCancelled(Request $req)
    {
        $res=Order::searchCancelled($req->search);

        return response()->json($res);
    }

 
    public function changeInfo(Request $req)
    {
        try {
            $user = User::find(Auth::user()->id);
            $req->name ? $user->name = $req->name : null;
            $req->phone ? $user->phone = $req->phone : null;
            $req->email ? $user->email = $req->email : null;
            $user->save();
            return response()->json(['code' => 200]);
        } catch (\Exception $e) {
            //
        }
    }
    public function changePassword(Request $req)
    {
        try {
            if (JWTAuth::attempt(['phone' => Auth::user()->phone, 'password' => $req->old_pwd])) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($req->new_pwd);
                $user->save();
                return response()->json(['code' => 200]);
            } else {
                return response()->json(['code' => 500]);
            }
        } catch (\Exception $e) {
            //
        }
    }

    public function tracking(Request $req)
    {
        try {
            Driver::updateLocation(Auth::user()->id, $req);
            return response()->json(['code' => 200]);
        } catch (\Exception $e) {
            return response()->json(['code' => 500]);
        }
    }

    public function findAll()
    {
        try {
            $driver = Driver::whereNotNull('lat')->whereNotNull('lng')->get(['user_id', 'lat', 'lng']);
            return response()->json($driver);
        } catch (\Exception $e) {
            return response()->json(['code' => 500]);
        }
    }

    public function loadOrders(Request $req)
    {
        $page = $req->page ? $req->page : 0;
        $type = $req->type ? $req->type : 0;
        $driver = Driver::where('user_id', Auth::user()->id)->firstOrFail();
        if ($type == 0) {
            $orders = Order::getAllOrderByDriver($driver->id, $page);
        } else if ($type == 4) {
            $orders = Order::getFinishOrderByDriver($driver->id, $page);
        } else {
            $orders = Order::getPendingOrderByDriver($driver->id, $page);
        }
        foreach ($orders as $order) {
            $order->created_at = date("d-m-Y", strtotime($order->created_at));
        }
        return response()->json($orders);
    }

    public function getOrder(Request $req)
    {
        $order = Order::getOrderById($req->order_id);
        return response()->json($order);
    }

    public function detail($id)
    {
        $order = Order::orderDetail($id);
        $sender_province = Province::where('province_id', $order->sender_province_id)->first();
        $sender_dist = District::find($order->sender_district_id);
        $receive_province = Province::where('province_id', $order->receive_province_id)->first();
        $receive_dist = District::find($order->receive_district_id);

        $order->sender_province_id = $sender_province ? $sender_province->name : '';
        $order->sender_district_id = $sender_dist ? $sender_dist->name : '';
        $order->receive_province_id = $receive_province ? $receive_province->name : '';
        $order->receive_district_id = $receive_dist ? $receive_dist->name : '';
        $order->created_at = date("d-m-Y", strtotime($order->created_at));
        return response()->json($order);
    }

    public function startShipping($id)
    {
        try {
            $order = Order::find($id);
            $order->status = 3;
            $order->save();
            //send notify to customer
            Device::sendMsgToDevice(Device::getToken($order->user_id), 'Thông báo từ IHT', 'Đơn hàng ' . $order->code . ' đang trên đường giao', []);
            return response()->json(200);
        } catch (\Exception $e) {
            return response()->json(e);
        }
    }

    public function finishShipping($id)
    {
        try {
            $order = Order::find($id);
            $order->status = 4;
            $order->save();
            //send notify to customer
            Device::sendMsgToDevice(Device::getToken($order->user_id), 'Thông báo từ IHT', 'Đơn hàng ' . $order->code . ' đã được giao thành công', []);
            return response()->json(200);
        } catch (\Exception $e) {
            return response()->json(e);
        }
    }

    public function updateFCM(Request $req)
    {
        try {
            Device::updateFcm(Auth::user()->id, $req->fcm);
            return response()->json(200);
        } catch (\Exception $e) {
            return response()->json(e);
        }
    }

    public function updateCustomerFCM(Request $req)
    {
        try {
            Device::updateFcm($req->id, $req->fcm);
            return response()->json(200);
        } catch (\Exception $e) {
            return response()->json(e);
        }
    }
    //raymond
    public function loadInfoSender(Request $req)
    {
        try {
            $data = Order::loadInfoSender($req);
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json(['code' => 500]);
        }
    }
    public function loadInfoReceive(Request $req)
    {
        try {
            $data = Order::loadInfoReceive($req);
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json(['code' => 500]);
        }
    }
    public function findDriver()
    { 
        try {
            $data = Driver::findDriver();
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['code' => 500]);
        }
    }
    public function checkCouponCode(Request $req)
    {
        $res=Order::checkCouponCode($req);
        if($res==200){
            return response()->json('ok');
        }else{
            return response()->json('fail');
        }

    }
    public function createOrder(Request $req)
    {
        try {
            $data = Order::createOrder($req);
            return response()->json(['data' => $data, 'code' => 200]);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
