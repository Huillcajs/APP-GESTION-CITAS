<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'reason',
        'patient_id',
        'medic_id',
        'status',
        'notes',
        'room',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

    public function medic()
    {
        return $this->belongsTo(Medics::class, 'medic_id');
    }
}

