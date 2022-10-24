<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
     /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request){
        $user = User::find($request->id);
        if($user){
            return $request->user()->hasVerifiedEmail()
                ? redirect()->route('auth.login')
                : $request->fulfill();
        }
        
 
        return redirect()->route('frontend.home');

    }
}
