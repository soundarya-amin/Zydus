<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseAssigned extends Model
{
    use HasFactory;

    protected $table = 'nurse_assigned';

    protected $fillable = [
        'nurse_code',
        'patient_id',
        'status',
    ];
}
