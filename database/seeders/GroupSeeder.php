<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// TODO: make seeder not loop in loop from O(n²) to O(n)

        foreach (Project::all() as $project) {
            $groupIndex = 1;
            for ($i = 0; $i < $project->groups; $i++) {
                DB::table('groups')
                    ->insert([
                        'group_index' => $groupIndex++,
                        'project_id' => $project->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
            }
        }
    }
}
