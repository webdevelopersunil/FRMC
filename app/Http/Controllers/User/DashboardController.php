<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;

class DashboardController extends Controller
{
    
    public function index(Request $request){

        $lists  =   Complain::paginate(10);

        $total  =   Complain::count();

        return view('user.dashboard', compact('lists','total'));
    }
    
}
