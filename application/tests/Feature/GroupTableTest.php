<?php

namespace Tests\Feature;

use App\Http\Livewire\GroupsTable;
use App\Models\Group;
use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class GroupTableTest extends TestCase
{
    public function testSelectStudent(): void
    {
        DB::beginTransaction();

        $user = ModelCreationHelper::createUser();
        $teacher = ModelCreationHelper::createTeacher($user->id);
        $project = ModelCreationHelper::createProject($teacher->id);
        $student = Student::create(['full_name' => 'Pilnas Pavadinimas']);
        $group = Group::create(['group_index' => 1, 'project_id' => $project->id]);

        $this->actingAs($user);
//Attach
        Livewire::test(GroupsTable::class, [$project])
            ->set('selectedStudent', $student->full_name)
            ->call('selected', $group->id, new StudentRepository())
            ->assertSet('selectedStudent', '')
            ->assertEmitted('renderStudentTable');

        $this->assertNotTrue($student->groups()->get()->isEmpty());

        $group = Group::create(['group_index' => 1, 'project_id' => $project->id]);
//Sync
        Livewire::test(GroupsTable::class, [$project])
            ->set('selectedStudent', $student->full_name)
            ->call('selected', $group->id, new StudentRepository())
            ->assertSet('selectedStudent', '');

        $this->assertSame($group->id, $student->groups()->first()->pivot->group_id);

        DB::rollBack();
    }

    public function testUnselect()
    {
        DB::beginTransaction();

        $user = ModelCreationHelper::createUser();
        $teacher = ModelCreationHelper::createTeacher($user->id);
        $project = ModelCreationHelper::createProject($teacher->id);
        $student = Student::create(['full_name' => 'Pilnas Pavadinimas']);
        $group = Group::create(['group_index' => 1, 'project_id' => $project->id]);

        $this->actingAs($user);
        $student->groups()->attach($group->id);
        Livewire::test(GroupsTable::class, [$project])
            ->call('unselect', $student->full_name, $group->id);

        $this->assertTrue($student->groups()->get()->isEmpty());

        DB::rollBack();
    }
}
