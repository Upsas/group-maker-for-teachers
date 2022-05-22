<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Teacher;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= UserFactory::USER_COUNT; $i++) {
            DB::table('teachers')->insert([
                'user_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        $project = Project::inRandomOrder()->get()->all();
        foreach (Teacher::all() as $teacher) {
            $randomNumber = rand(0, 2);
            for ($i = 0; $i < $randomNumber; $i++) {
                $teacher->projects()->attach($project[$i]);
                unset($project[$i]);
                $project = array_values($project);
            }
        }
    }
}
