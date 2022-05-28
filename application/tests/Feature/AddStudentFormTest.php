<?php

namespace Tests\Feature;

use App\Http\Livewire\AddStudentForm;
use App\Models\User;
use Livewire\Livewire;
use PDOException;
use Tests\TestCase;

class AddStudentFormTest extends TestCase
{
    public function testStoreStudent(): void
    {
        try {
            $user = ModelCreationHelper::createUser();
        } catch (PDOException $exception) {
            User::where('email', 'TestingEmail@gmail.com')->first()->forceDelete();
            $user = ModelCreationHelper::createUser();
        }

        $teacher = ModelCreationHelper::createTeacher($user->id);

        $project = ModelCreationHelper::createProject($teacher->id);

        $this->actingAs($user);

        Livewire::test(AddStudentForm::class, [$project])
            ->set('full_name', 'test')
            ->call('storeStudent')
            ->assertSet('hiddenStudentForm', 'hidden')
            ->assertSet('full_name', '')
            ->assertEmitted('renderFlashMessage')
            ->assertEmitted('renderStudentTable')
            ->assertEmitted('renderGroupTables');

        $user->forceDelete();
        $teacher->delete();
        $project->delete();
    }
}
