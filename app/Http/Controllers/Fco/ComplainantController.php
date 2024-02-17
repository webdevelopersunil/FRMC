<?php

namespace App\Http\Controllers\Fco;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Complain;

class ComplainantController extends Controller{


    public function index(Request $request){

        $lists  =   Complain::paginate(10);

        return view('fco.list', compact('lists'));
    }

    public function edit($list_id){

        $complain    =   Complain::find($list_id);
        
        return view('fco.edit', compact('list_id','complain'));
    }

    public function update(Request $request){

        try {
            // Update the Complain record
            DB::beginTransaction();

            Complain::where('id', $request->id)->update([
                'work_centre' => trim($request->work_centre),
                'complaint_status' => trim($request->complaint_status),
            ]);

            DB::commit();

            // Redirect with success message
            return redirect()->route('fco.complaints')->with('success', 'Complaint has been updated');
            
        } catch (\Exception $e) {
            // Rollback the transaction in case of any exception
            DB::rollBack();

            // Log the error
            \Log::error('Error updating complaint: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to update complaint. Please try again.');
        }
    }

    public function view($complain_id){

        $complain    =   Complain::find($complain_id);
        // $nodalAdditionalDetails  =   NodalAdditionalDetail::where('complain_id',$complain_id)->get();
        
        return view('fco.view', compact('complain'));
    }

}