<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProjectInfoTable extends Component
{
    public Project $project;

    protected $listeners = ['refreshProjectInfoTable' => '$refresh'];

    public function mount(Project $project): void
    {
        $this->project = $project;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.project-info-table');
    }
}
