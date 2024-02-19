<?php

namespace App\Http\Controllers\Nodal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Services\FileUploadService;
use App\Models\UserAdditionalDetail;
use App\Models\PreliminaryReport;
use App\Models\NodalAdditionalDetail;
use App\Models\File;
use Auth;

class ComplainantController extends Controller{


    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService){

        $this->fileUploadService    =   $fileUploadService;
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
        
        $complain                   =   Complain::find($complain_id);
        $preliminaryReport          =   File::find($complain->preliminary_report);
        
        $nodalAdditionalDetails     =   NodalAdditionalDetail::where('complain_id',$complain_id)->get();
        
        return view('nodal.view', compact('complain','nodalAdditionalDetails','preliminaryReport'));
    }
    

    public function update(Request $request){

        try {
            
            \DB::beginTransaction();

            if($request->hasFile('preliminary_report')){

                $complain   =   Complain::find($request->id);
                $file       =   File::upload($request->preliminary_report,'/nodal/'.$complain->complain_no.'/preliminary_report/');
                $complain->preliminary_report   =   $file->id;

                $complain->save();
            }
            
            if( $request->hasFile('files') ){
                foreach( $request->file('files') as $index => $file ){

                    $file       =   File::upload($file, '/nodal/'.$complain->complain_no.'/additional_document/');
                    $nodalAdditionalDetail                  =   new NodalAdditionalDetail();
                    $nodalAdditionalDetail->complain_id     =   $request->id;
                    $nodalAdditionalDetail->nodal_id        =   \Auth::user()->id;
                    $nodalAdditionalDetail->description     =   $request->details[$index];
                    $nodalAdditionalDetail->file            =   $file->id;

                    $nodalAdditionalDetail->save();
                }
            }
        
            return redirect()->route('nodal.complaints')->with('success', 'Complain has been updated');

        } catch (\Exception $e) {

            // Rollback the transaction in case of any exception
            \DB::rollBack();

            // Log the error
            \Log::error('Error updating complaint: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update complaint. Please try again.');
        }
    }

}
