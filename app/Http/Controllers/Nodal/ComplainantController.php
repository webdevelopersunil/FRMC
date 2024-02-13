<?php

namespace App\Http\Controllers\Nodal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplainantController extends Controller
{

    public function index(Request $request){

        return view('nodal.list');
    }

    public function edit(Request $request){

        return view('nodal.edit');
    }

}
