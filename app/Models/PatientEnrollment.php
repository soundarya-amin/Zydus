<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientEnrollment extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'patient_id',
        'zydus_rep_name',
        'patient_type',
        'full_name',
        'email',
        'contact_number',
        'caregiver_contact_number',
        'doctor_name',
        'address',
        'city',
        'state',
        'pincode',
        'govt_id',
        'prescription',
        'status',
    ];
}
