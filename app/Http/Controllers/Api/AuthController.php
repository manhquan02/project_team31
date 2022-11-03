<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->email || !$request->password) {
            return response()->json([
                'result' => false,
                'message' => 'Cần nhập đủ các trường thông tin'
            ]);
        }
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            if ($request->checkbox == 'on') {
                Cookie::queue('email', $request->email, 44640);
                Cookie::queue('password', $request->password, 44640);
            }
            return response()->json(['result' => true]);
        } else return response()->json([
            'result' => false,
            'message' => 'Tài khoản hoặc mật khẩu không chính xác'
        ]);
    }


    public function register(Request $request)
    {
        $new_user = new User();
        $user = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();
        if ($user != null) {
            return response()->json([
                'result' => false,
                'message' => 'Số điện thoại hoặc email đã tồn tại'
            ]);
        }

        if ($request->password != $request->confirm_password) {
            return response()->json([
                'result' => false,
                'message' => 'Mật khẩu không trùng khớp'
            ]);
        }

        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->phone = $request->phone;
        $new_user->password = Hash::make($request->password);
        $new_user->address = $request->address;
        $new_user->gender = $request->gender;
        $new_user->save();

        return response()->json([
            'result' => true,
            'message' => 'Đăng ký tài khoản thành công'
        ]);
    }
}
