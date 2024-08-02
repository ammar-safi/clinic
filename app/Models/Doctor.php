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
        "specialization_id",
    ];

    public function specialization() {
        return $this->belongsTo(specialization::class) ;
    }

    public function Appointments(){
        return $this->hasMany(Appointment::class );
    }
}
