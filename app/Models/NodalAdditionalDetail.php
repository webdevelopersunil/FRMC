<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class NodalAdditionalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'complain_id',
        'complainant_id',
        'description',
        'file',
        'path',
        'mime',
    ];
}
