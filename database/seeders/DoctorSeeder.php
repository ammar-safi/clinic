<?php

namespace Database\Seeders;

use App\Models\specialization;
use App\Models\Specialties;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("doctors")->insert([
            "specialization_id"=> rand(1 , specialization::all()->count()),
            "name"=>fake()->name() ,
            "phone_number"=> fake()->phoneNumber(),

        ]);
    }
}
