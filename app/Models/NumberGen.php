<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberGen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'min',
        'max',
        'padding',
        'last',
        'current',
        'step',
        'Active',


    ];
}
