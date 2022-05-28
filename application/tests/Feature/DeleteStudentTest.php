<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteModal;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteStudentTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteStudent(): void
    {
        DB::beginTransaction();

        $user = ModelCreationHelper::createUser();
        $teacher = ModelCreationHelper::createTeacher($user->id);
        $project = ModelCreationHelper::createProject($teacher->id);


        $student = Student::create(['full_name' => 'Testas']);
        $group = Group::create(['group_index' => 1, 'project_id' => $project->id]);

        $this->actingAs($user);

        $project->students()->attach($student->id);
        $group->students()->attach($student->id);

        Livewire::test(DeleteModal::class)
            ->set('studentId', $student->id)
            ->call('delete', new StudentRepository())
            ->assertEmitted('renderGroupTables')
            ->assertEmitted('renderStudentTable')
            ->assertEmitted('renderFlashMessage')
            ->assertDontSee('Testas');

        $this->assertTrue($group->students()->get()->isEmpty());
        $this->assertTrue($project->students()->get()->isEmpty());

        DB::rollBack();
    }

    public function testOpenDeleteModal(): void
    {
        DB::beginTransaction();

        $user = ModelCreationHelper::createUser();

        $this->actingAs($user);

        Livewire::test(DeleteModal::class)
            ->call('openDeleteModal', 1)
            ->assertSee('Do you really want to delete a student?');

        DB::rollBack();
    }
}
