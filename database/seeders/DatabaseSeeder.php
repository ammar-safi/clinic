<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(AdminSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(specializationSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
