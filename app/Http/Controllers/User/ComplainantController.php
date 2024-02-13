<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplainantController extends Controller
{
    
    public function index(Request $request){

        return view('user.list');
    }

    public function edit(Request $request){

        return view('user.edit');
    }
}
