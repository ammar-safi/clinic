<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "doctor_id",
        "patient_id",
        "rate",
        "comment",
    ];

    public function Doctors() {
        return $this->belongsTo(Doctor::class);
    }    
    public function patients() {
        return $this->belongsTo(Patient::class , );
    }
}
