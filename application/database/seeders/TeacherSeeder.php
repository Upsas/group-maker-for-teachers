<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
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
    }
}
