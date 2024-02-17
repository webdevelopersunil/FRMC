<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $table = 'complains';

    protected $fillable = [
        'complain_no',
        'complainant_id',
        'description',
        'work_centre',
        'department_section',
        'against_persons',
        'public_status',
        'complaint_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'against_persons',
        'work_centre',
        'department_section',
    ];

    public static function generateUniqueComplainNo($length = 10)
    {
        do {
            $complain_no = Str::random($length);
        } while (static::where('complain_no', $complain_no)->exists());

        return $complain_no;
    }
    
}
