<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseAssigned extends Model
{
    use HasFactory;

    protected $table = 'nurse_assigned';

    protected $fillable = [
        'patient_id',
        'date_assigned',
        'updated_by',
        'status',
    ];

    public function patientEnrollment()
    {
        return $this->belongsTo(PatientEnrollment::class, 'patient_id');
    }
}
