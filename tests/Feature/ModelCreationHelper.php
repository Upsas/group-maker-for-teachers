<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Teacher;
use App\Models\User;

trait ModelCreationHelper
{
    public static function createUser(): User
    {
        return User::create([
            'name' => 'Name Testing',
            'email' => 'TestingEmail@gmail.com',
            'password' => 'password'
        ]);
    }

    public static function createTeacher(int $userId): Teacher
    {
        return Teacher::create(['user_id' => $userId]);
    }

    public static function createProject(int $teacherId): Project
    {
      return Project::create([
            'name' => 'test',
            'groups' => 1,
            'students_per_group' => 5,
            'teacher_id' => $teacherId
        ]);
    }
}
