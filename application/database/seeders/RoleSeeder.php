<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::ROLES as $key => $value) {
            DB::table('roles')->insert([
                'name' => $key,
                'role_id' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
