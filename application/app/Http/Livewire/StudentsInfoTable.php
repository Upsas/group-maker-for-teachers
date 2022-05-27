<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsInfoTable extends Component
{
    use WithPagination;

    protected $listeners = ['renderStudentTable'];

    public Project $project;

    public function mount(Project $project): void
    {
        $this->project = $project;
    }

    public function renderStudentTable(): void
    {
        $this->render();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.students-info-table');
    }
}
