<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
       
        //login user
        if (auth()->user())
        {
            return $request->user()->hasVerifiedEmail()
                ? redirect()->route('auth.login')
                : view('screens.frontend.auth.very-email');
        }
//guest
        else
        {
            return $request->user()
                ? redirect($this->redirectPath())
                : redirect('/login');
        }

    }

}
