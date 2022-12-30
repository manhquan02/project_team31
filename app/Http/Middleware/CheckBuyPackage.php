<?php

namespace App\Http\Middleware;

use App\Models\Attendance;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBuyPackage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ex_package = Attendance::where('status',2)->where('user_id', Auth::id())->count();
        if ($ex_package > 0) {
            return redirect()->back();
        }

        return $next($request);
    }
}
