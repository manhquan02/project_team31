<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CoachController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $coachs = User::role('coach')->get();

        $rate = Rate::orderBy('star_pt', 'desc')->limit(3)->get();
        $top = [];
        foreach ($rate as $item) {
            foreach ($coachs as $item_c) {
                if ($item->pt_id == $item_c->id) {
                    $top[] = $item_c;
                }
            }
        }
        if(count($top) < 3) {
            $top = User::role('coach')->limit(3)->get();
        }
        
        return view('screens.frontend.coach.index', compact('coachs', 'top'));
    }

    public function detail($id){
        $coach = User::where('id', $id)->first();
        $rates = Rate::where('pt_id', $id)->orderBy('star_pt', 'desc')->limit(6)->get();
        if($coach != null){
            return view('screens.frontend.coach.detail', compact('coach','rates'));
        }
    }
}
