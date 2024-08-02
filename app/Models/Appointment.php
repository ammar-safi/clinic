<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "doctor_id",
        "patient_id",
        "date",
        "time",
        "state",
    ];

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function Report() {
        return $this->hasOne(Report::class , "id_appointment");
    }
}
