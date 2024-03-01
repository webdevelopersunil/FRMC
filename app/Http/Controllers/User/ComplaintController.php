<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\File;
use App\Models\Complain;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserAdditionalDetail;


class ComplaintController extends Controller{
    
    public function index(Request $request){

        $lists  =   Complain::where('complainant_id',Auth::user()->id)->paginate(10);
        return view('user.list', compact('lists'));
    }

    public function create(Request $request){
        
        $complainNo = Complain::getComplainNo();

        return view('user.create', compact('complainNo'));
    }

    public function store(Request $request){
        
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
            $complain->complainant_id       =   Auth::user()->id;
            $complain->description          =   $request->description;
            $complain->work_centre          =   $request->work_centre;
            $complain->department_section   =   $request->department_section === 'Others' ? $request->department_section_other : $request->department_section;
            $complain->against_persons      =   $request->against_persons;
            $complain->public_status        =   $request->public_status;
            $complain->save();

            if ($request->hasFile('document')) {

                foreach( $request->file('document') as $index => $file ){
                    
                    $file   =   File::upload($file, $complain->complain_no.'/user/additional-document/');
                    
                        $userAdditionalDetail                   =   new UserAdditionalDetail();
                        $userAdditionalDetail->complain_id      =   $complain->id;
                        $userAdditionalDetail->complainant_id   =   Auth::user()->id;
                        $userAdditionalDetail->description      =   $request->additional_detail[$index];
                        $userAdditionalDetail->file_id          =   $file->id;

                        $userAdditionalDetail->save();
                }
            }

            return redirect()->route('user.complaints')->with('success', 'Complaint has been created and the complaint number is ' . $complain->complain_no);
            
        } catch (\Exception $e) {
            // dd($e);
            // Handle exceptions
            return redirect()->route('user.complaint.create')->with('error', 'Failed to register complaint: '.$e->getMessage());
        }

    }

    public function view($complain_id){
 
        $complain               =   Complain::with('preliminaryReport','userAdditionalDetails')->find($complain_id);
        $userAdditionalDetails  =   UserAdditionalDetail::where('complain_id',$complain->id)->get();

        return view('user.view', compact('complain'));
    }
    
    public function edit(Request $request){

        return view('user.edit');
    }
}
