<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sync extends Model
{
    use HasFactory;
    protected $fillable = [
        'instituteName',
        'instituteNumber',
        'details',
        'workStatus',
        'occasion',
        'providerName',
        'bill',
        'created_at'
    ];
}
