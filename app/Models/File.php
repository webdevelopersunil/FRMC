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
        
        $fileName   =   time(). '.'. $file->extension();
        
        $file->storeAs($path,$fileName);

        $savedFile   =   self::create([
            'name'      =>  $fileName,
            'mime'      =>  $file->extension(),
            'directory' =>  $path,
        ]);

        return $savedFile;
    }

    public function preliminary_report()
    {
        return $this->belongsTo(Complain::class, 'preliminary_report', 'id');
    }

}
