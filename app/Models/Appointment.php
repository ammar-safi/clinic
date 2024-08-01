<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_doctor",
        "id_patient",
        "date",
        "time",
        "state",
    ];

    public function Doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function Patients()
    {
        return $this->belongsTo(Patient::class);
    }
    public function Report() {
        return $this->hasOne(Report::class , "id_appointment");
    }
}
