<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone_number",
        "date",
    ];

    public function Appointments(){
        return $this->hasMany(Appointment::class , "patient_id");
    }
}
