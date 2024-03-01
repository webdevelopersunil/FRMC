<?php

namespace App\Http\Controllers\Fco;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\DetailedStatus;
use Auth;

class ComplainantController extends Controller{

    protected $user;

    public function __construct(){
        
        $this->user = Auth::user();
    }


    public function index(Request $request){

        $lists  =   Complain::paginate(10);

        return view('fco.list', compact('lists'));
    }

    public function edit($list_id){

        $complain           =   Complain::with('preliminaryReport','nodalAdditionalDetails')->find($list_id);
        
        $detailedStatus     =   DetailedStatus::where(['complain_id'=>$list_id])->first();
        
        return view('fco.edit', compact('list_id','complain','detailedStatus'));
    }

    public function update(Request $request){
        
        try {
            
            // Update the Complain record
            DB::beginTransaction();

            // Update complain with public status
            $complain = Complain::find($request->id);
            if ($complain) {
                $complain->public_status    = $request->public;
                $complain->complaint_status = trim($request->complaint_status);
                $complain->save();
            }

            // $complain->work_centre      = trim($request->work_centre);

            $detailedStatus = DetailedStatus::updateOrCreate(
                ['complain_id' => $request->id, 'fco_id' => \Auth::user()->id],
                ['public' => $request->public, 'private' => $request->private]
            );

            DB::commit();

            // Redirect with success message
            return redirect()->route('fco.complaints')->with('success', 'Complaint has been updated');
            
        } catch (\Exception $e) {
            // Rollback the transaction in case of any exception
            DB::rollBack();

            // Log the error
            \Log::error('Error updating complaint: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update complaint. Please try again.'. $e->getMessage());
        }
    }

    public function view($complain_id){

        $complain    =   Complain::with('userAdditionalDetails')->find($complain_id);
        
        $detailedStatus     =   DetailedStatus::where(['complain_id'=>$complain->id])->first();
        
        return view('fco.view', compact('complain','detailedStatus'));
    }

    public function workCentreEdit($id){

        $complain   =   Complain::with('preliminaryReport','nodalAdditionalDetails')->find($id);
        
        return view('fco.work-centre.edit', compact('complain'));

    }

    public function workCentreUpdate(Request $request){
        
        try {
            
            // Update the Complain record
            DB::beginTransaction();

            $complain = Complain::find($request->id);
            if ($complain) {
                $complain->work_centre      = trim($request->work_centre);
                $complain->save();
            }            

            DB::commit();

            // Redirect with success message
            return redirect()->route('fco.complaints')->with('success', 'Complaint has been updated');
            
        } catch (\Exception $e) {
            // Rollback the transaction in case of any exception
            DB::rollBack();

            // Log the error
            \Log::error('Error updating complaint: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update complaint. Please try again.'. $e->getMessage());
        }
    }

}