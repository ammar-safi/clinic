<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_doctor",
        "id_patient",
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
