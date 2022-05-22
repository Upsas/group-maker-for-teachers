<?php

namespace Database\Seeders;

use App\Models\Project;
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
    }
}
