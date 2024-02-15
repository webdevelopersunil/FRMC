<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdditionalDetail extends Model
{
    use HasFactory;

    protected $table = 'complains';

    protected $fillable = [
        'complain_id',
        'complainant_id',
        'description',
        'document_name',
        'directory',
        'mime_type',
    ];

}
