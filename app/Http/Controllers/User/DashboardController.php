<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use Auth;
class DashboardController extends Controller
{
    
    public function index(Request $request){

        $lists  =   Complain::where('complainant_id',Auth::user()->id)->paginate(10);
        $total  =   Complain::count();

        return view('user.dashboard', compact('lists','total'));
    }
    
}
