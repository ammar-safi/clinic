<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
    ];


    public function Doctor(){
        return $this->hasMany(Doctor::class);
    }
}
