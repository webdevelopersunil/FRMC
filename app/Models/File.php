<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'directory',
        'mime',
        'size',
    ];


    public static function upload($file,$path){
        // dd($file->size());
        // $fileName   =   time(). '.'. $request->image->extension();
        // $request->image->storeAs('images',$fileName);
        // $size   =   $file->size;
        
        $fileName   =   time(). '.'. $file->extension();
        $file->storeAs($path,$fileName);

        $savedFile   =   self::create([
            'name'      =>  $fileName,
            'mime'      =>  $file->extension(),
            'directory' =>  $path,
        ]);

        return $savedFile;
    }

}
