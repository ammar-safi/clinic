<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("reviews")->insert([
            "doctor_id" => rand(1, Doctor::all()->count()),
            "patient_id" => rand(1, Patient::all()->count()),
            "rate" => rand(0,10),
            "comment" => fake()->title(),
        ]);
    }
}
