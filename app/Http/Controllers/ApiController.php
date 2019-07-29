<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\Models\Driver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    public $loginAfterSignUp = true;

    // public function register(RegisterAuthRequest $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     if ($this->loginAfterSignUp) {
    //         return $this->login($request);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => $user,
    //     ], 200);
    // }

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

        $user = Auth::user();

        return response()->json([
            'token' => 'Bearer ' . $jwt_token,
            'id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
        ]);
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
            if (JWTAuth::attempt(['phone' => $this->jwt->user()->phone, 'password' => $req->old_pwd])) {
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
}
