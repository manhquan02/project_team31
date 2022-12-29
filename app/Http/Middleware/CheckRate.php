<?php

namespace App\Http\Middleware;

use App\Models\Attendance;
use App\Models\Order;
use App\Models\Rate;
use Attribute;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRate
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
        $total_success = Attendance::where('user_id', '=', Auth::id())->where('status', 2)->count();
        $total_session = Attendance::where('user_id', '=', Auth::id())->count();
        $orderId = Attendance::where('user_id', '=', Auth::id())->first()->order_id;

        $package_id = Order::where('id', $orderId)->first()->package_id;

        $rate = Rate::where('user_id',  Auth::id())->where('package_id', $package_id)->first();
        if ($total_success / $total_session * 100 > 80 && $rate == null) {
            return redirect()->route('rate.index', $package_id);
        }
        return $next($request);
    }
}
