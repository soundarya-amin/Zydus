<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'contact_number',
        'caregiver_contact_number',
        'permanent_address',
        'delivery_address',
        'gender',
        'date_of_birth',
        'nationality',
        'prescription',
        'govt_id',
        'consent',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
