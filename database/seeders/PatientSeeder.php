<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("patients")->insert([
            "name" => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            "date" => fake()->date("Y-m-d")

        ]);
    }
}
