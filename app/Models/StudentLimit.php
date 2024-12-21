<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLimit extends Model
{
    //
    protected $fillable = [
        'instituteID',
        'referName',
        'oldLimit',
        'newLimit',
        'document',
        'bill',
    ];
}
