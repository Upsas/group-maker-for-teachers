<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Repositories\StudentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GroupsTable extends Component
{
    protected $listeners = ['renderGroupTables' => '$refresh'];

    public Project $project;
    public $selectedStudent = '';
    public $allStudents;

    public function mount(Project $project): void
    {
        $this->project = $project;
        $this->allStudents = $project->students()->get();
    }

    public function selected(int $currentGroupId, StudentRepository $studentRepo): void
    {
        $student = $studentRepo->where('full_name', $this->selectedStudent)->first();
        $studentGroups = $student->groups();

        if ($studentGroups->get()->isEmpty()) {
            $studentGroups->attach($currentGroupId);
        } else {
            $studentGroups->sync($currentGroupId);
        }

        $this->reset('selectedStudent');
        $this->emit('renderStudentTable');
    }

    public function unselect(string $studentFullName, int $currentGroupId, StudentRepository $studentRepo)
    {
        $student = $studentRepo->where('full_name', $studentFullName)->first();
        $student->groups()->detach($currentGroupId);
        $this->emit('renderStudentTable');
    }

    public function render(): Factory|View|Application
    {
        $groups = $this->project->groups()->get();
        $allStudents = $this->project->students();
        return view('livewire.groups-table', ['groups' => $groups, 'allStudents' => $allStudents]);
    }
}
