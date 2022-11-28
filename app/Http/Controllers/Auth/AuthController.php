<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\UploadImgService;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function signup(){
        return view('screens.frontend.auth.signup');
    }

    public function postSignup(Request $request){
        $user = new User();
        if($request->hasFile('avatar')){
            // dd($request->avatar);
            $file = $request->avatar;
            $file_name = UploadImgService::uploadImg($request->avatar,'images/user');
        }
        else{
            $file_name = 'one.jpg';
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->avatar = 'images/user/'.$file_name;
        $user->address = $request->address;
        $user->assignRole('member');
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return back();

    }


    public function login(){
        // dd(Auth::id());
        if(Auth::attempt([
            'email' => 'admin@example.com',
            'password' => 12345678
        ])){
            return redirect()->route('home');
        }
        else{
            return back()->with('error', translate('Email or password incorrect'));
        }
        return view('screens.frontend.auth.login');
    }

    public function postLogin(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt([
            'email' => $email,
            'password' => $password
        ])){
            return redirect()->route('home');
        }
        else{
            return back()->with('error', translate('Email or password incorrect'));
        }

    }
}
