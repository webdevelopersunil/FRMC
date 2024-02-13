<?php

namespace App\Http\Controllers\Fco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplainantController extends Controller
{

    public function index(Request $request){

        return view('fco.list');
    }

    public function edit(Request $request){

        return view('fco.edit');
    }

}
