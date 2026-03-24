<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::factory()->learning()->count(50)->create();
        Student::factory()->notLearning()->count(50)->create();
    }
}