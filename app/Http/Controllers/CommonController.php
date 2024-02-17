<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller{


    public function preview($path, $file){

        // Combine path and file to form the full file path
        $filePath = $path . '/' . $file;
        
        
        // Check if the file exists in the storage
        if (Storage::exists($filePath)) {
            // Return the file with the appropriate content type
            return Storage::response($filePath);
        }

        // File not found, return a 404 response
        abort(404);
    }
}
