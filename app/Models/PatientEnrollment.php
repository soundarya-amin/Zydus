<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientEnrollment extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'patient_enrollments';

    protected $fillable = [
        'patient_code',
        'ref_id',
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

    public function nurseAssigned()
    {
        return $this->hasOne(NurseAssigned::class, 'patient_id');
    }

    protected static function booted(): void
    {
        static::creating(function (PatientEnrollment $patient) {
            $patient->ref_id = self::generateRefId();
            $patient->patient_code = self::generatePatientCode();
        });
    }

    private static function generateRefId(): string
    {
        return bin2hex(random_bytes(16));
    }

    private static function generatePatientCode(): string
    {
        return 'ZYD-' . str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}
