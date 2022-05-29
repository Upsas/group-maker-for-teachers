<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public const PROJECT_COUNT = 50;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Project::factory(self::PROJECT_COUNT)->create();

        foreach (Project::all() as $project) {
            $students = Student::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $project->students()->attach($students);
        }
    }
}
