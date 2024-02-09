<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller{
    
    public function index(){

        // return view('welcome');
        return redirect('login');
    }

    public function userLogin(){

        return view('auth.user_login');
    }
}