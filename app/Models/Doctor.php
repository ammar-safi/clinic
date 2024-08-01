<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone_number",
        "id_specialization",
    ];

    public function Specialize() {
        return $this->belongsTo(Specialties::class);
    }

    public function Appointments(){
        return $this->hasMany(Appointment::class , "doctor_id");
    }
}
