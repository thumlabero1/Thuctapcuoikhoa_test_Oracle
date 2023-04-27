<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'start_day',
        'staff_id',
        'salary',
        'coefficients_salary',
        'thumb'
        
    ];

    
}
