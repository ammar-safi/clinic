<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_appointment",
        "description",
    ];

    public function Appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    

}
