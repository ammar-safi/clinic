<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("appointments")->insert([
            "doctor_id"=> rand(1 , Doctor::all()->count()),
            "patient_id"=> rand(1 , Patient::all()->count()),
            "date"=> fake()->date("Y-m-d") ,
            "time"=> fake()->date("H:i:s"),
            "state"=> rand(0,1),

        ]);
    }
}
