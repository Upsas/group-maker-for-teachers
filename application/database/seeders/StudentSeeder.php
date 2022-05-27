<?php

namespace Database\Seeders;

use App\Models\Student;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Student::factory(UserFactory::USER_COUNT * 30)->create();
    }
}
