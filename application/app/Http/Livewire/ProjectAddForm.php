<?php

namespace App\Http\Livewire;

use App\Repositories\ProjectRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class ProjectAddForm extends Component
{
    public $hidden = 'hidden';
    public $teacher_id;
    public $name;
    public $groups;
    public $students_per_group;

    public function mount(int $teacherId): void
    {
        $this->teacher_id = $teacherId;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.project-add-form');
    }

    public function store(ProjectRepository $projectRepo): Redirector|RedirectResponse
    {
        $this->hidden = '';
        $this->validate();
        $addedProject = $projectRepo->createProjectWithGroups($this->validate());
        $this->resetExcept('teacher_id');
        session()->flash('message', 'Project successfully added.');
        return redirect()->to(route('project', $addedProject->id));
    }

    protected function rules(): array
    {
        return [
            'name' => ['string', 'required', 'max:255'],
            'groups' => ['numeric','max:999' ,'required'],
            'students_per_group' => ['max:50', 'required', 'numeric'],
            'teacher_id' => ['required', 'numeric', "in:$this->teacher_id"]
        ];
    }
}
