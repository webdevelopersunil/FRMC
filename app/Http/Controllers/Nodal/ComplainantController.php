<?php

namespace App\Http\Controllers\Nodal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Services\FileUploadService;
use App\Models\UserAdditionalDetail;
use App\Models\PreliminaryReport;
use App\Models\NodalAdditionalDetail;

class ComplainantController extends Controller{


    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService){

        $this->fileUploadService = $fileUploadService;
    }


    public function index(Request $request){

        $lists  =   Complain::paginate(10);

        return view('nodal.list', compact('lists'));
    }

    public function edit($list_id){

        $complain    =   Complain::find($list_id);

        return view('nodal.edit', compact('complain','list_id'));
    }

    public function view($complain_id){

        $complain    =   Complain::find($complain_id);
        $nodalAdditionalDetails  =   NodalAdditionalDetail::where('complain_id',$complain_id)->get();
        
        return view('nodal.view', compact('complain','nodalAdditionalDetails'));
    }
    

    public function update(Request $request){

        if($request->hasFile('preliminary_report')){

            $preliminaryReport   =   new PreliminaryReport();
            $preliminaryReport->complain_id =   1;
            $preliminaryReport->file        =   $this->fileUploadService->uploadFile($request->file('preliminary_report'), 'nodal/preliminary_report/');
            $preliminaryReport->mime        =   'png';
            $preliminaryReport->save();
        }
        
        if( $request->hasFile('files') ){

            // dd($request->details[0]);
            foreach( $request->file('files') as $index => $file ){
                
                $nodalAdditionalDetail                  =   new NodalAdditionalDetail();
                $nodalAdditionalDetail->complain_id     =   $request->id;
                $nodalAdditionalDetail->complainant_id  =   1;
                $nodalAdditionalDetail->description     =   $request->details[$index];
                $nodalAdditionalDetail->file            =   $this->fileUploadService->uploadFile($file, 'nodal/additional_document/');
                $nodalAdditionalDetail->path            =   'nodal/additional_document/';
                $nodalAdditionalDetail->mime            =   'png';
                $nodalAdditionalDetail->save();
                
            }
        }

        return redirect()->route('nodal.complaints')->with('success', 'Complain has been updated');
    }

}
