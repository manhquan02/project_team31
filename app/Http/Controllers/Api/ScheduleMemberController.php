<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleMemberController extends Controller
{
    public function index(Request $request){
        $userId = Auth::id();
    }
}
