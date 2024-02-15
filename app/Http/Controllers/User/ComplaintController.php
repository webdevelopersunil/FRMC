<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Complain;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ComplaintController extends Controller{
    
    public function index(Request $request){

        $lists  =   Complain::all();

        return view('user.list', compact('lists'));
    }

    public function create(Request $request){

        // $complainNo = Complain::generateUniqueComplainNo();

        $complainNo     =   'CMPL000'.rand(10,1000000);
        
        return view('user.create', compact('complainNo'));
    }

    public function store(Request $request){
        // dd($request->all());
        $attributes = request()->validate([

            'complain_no'               => ['required'],
            'description'               => ['required'],
            'department_section'        => ['required'],
            'against_persons'           => ['required'],
            'work_centre'               => ['required'],
        ]);

        try {
            
            $complain                       =   new Complain();
            $complain->complain_no          =   $request->complain_no;
            // $complain->complainant_id       =   $request->complainant_id;
            $complain->description          =   $request->description;
            $complain->work_centre          =   $request->work_centre;
            $complain->department_section   =   $request->department_section;
            $complain->against_persons      =   $request->against_persons;
            $complain->public_status        =   $request->public_status;
            $complain->save();

            return redirect()->route('user.complaints')->with('success', 'complain has been created');
            
        } catch (\Exception $e) {
            // Handle exceptions
            return redirect()->route('user.complaint.create')->with('error', 'Failed to register complain');
        }

    }

    public function view($complain_id){

        $complain    =   Complain::find($complain_id);
        
        return view('user.view', compact('complain'));
    }
    
    public function edit(Request $request){

        return view('user.edit');
    }
}
