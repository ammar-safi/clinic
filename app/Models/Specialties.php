<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialties extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
    ];


    public function Doctor(){
        return $this->hasOne(Doctor::class , "Specialize_id");
    }
}
