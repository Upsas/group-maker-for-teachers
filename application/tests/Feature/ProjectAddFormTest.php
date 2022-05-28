<?php

namespace Tests\Feature;

use App\Http\Livewire\ProjectAddForm;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectAddFormTest extends TestCase
{
    public function testProjectStore(): void
    {
        DB::beginTransaction();
        $user = ModelCreationHelper::createUser();
        $this->actingAs($user);
        $teacher = ModelCreationHelper::createTeacher($user->id);

        Livewire::test(ProjectAddForm::class, [$teacher->id])
            ->set('name', 'testas')
            ->set('groups', 5)
            ->set('students_per_group', 5)
            ->call('store', new ProjectRepository())
            ->assertSet('hidden', 'hidden')
            ->assertSet('teacher_id', $teacher->id)
            ->assertSessionHas('message')
            ->assertRedirect(route('project', DB::table('projects')->orderBy('created_at', 'DESC')
                ->first()->id));

        DB::rollBack();
    }

    /**
     * @dataProvider validationDataProvider
     */
    public function testProjectStoreValidation($key, $value, $rule)
    {
        DB::beginTransaction();
        $user = ModelCreationHelper::createUser();
        $this->actingAs($user);
        $teacher = ModelCreationHelper::createTeacher($user->id);

        Livewire::test(ProjectAddForm::class, [$teacher->id])
            ->set($key, $value)
            ->call('store')
            ->assertHasErrors([$key => $rule]);
        DB::rollBack();
    }

    public function validationDataProvider(): array
    {
        return [
            ['name', null, 'required'],
            ['name', 8, 'string'],
            ['name', str_repeat('*', 256), 'max'],
            ['groups', 'test', 'numeric'],
            ['groups', str_repeat('*', 1000), 'max'],
            ['groups', 0, 'gt'],
            ['groups', null, 'required'],
            ['students_per_group', 'test', 'numeric'],
            ['students_per_group', str_repeat('*', 51), 'max'],
            ['students_per_group', 0, 'gt'],
            ['students_per_group', null, 'required'],
            ['teacher_id', 'testas', 'numeric'],
        ];
    }
}
