<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller{


    public function viewFile($filename){
        
        $filePath = "CMPL0000333740/user/additional-document/{$filename}";

        // Check if the file exists
        if (Storage::exists($filePath)) {
            // Return the file with appropriate content type
            return response()->file(storage_path("app/{$filePath}"));
        } else {
            // Return a 404 response if the file does not exist
            abort(404);
        }
    }

    public function previewFile($file_id){

        $file       =   File::find($file_id);

        $filePath   =   "{$file->directory}{$file->name}";

        if (Storage::exists($filePath)) {
            // Return the file with appropriate content type
            return response()->file(storage_path("app/{$filePath}"));
        } else {
            // Return a 404 response if the file does not exist
            abort(404);
        }
        
    }

}
