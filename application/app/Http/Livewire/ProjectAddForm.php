<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProjectAddForm extends Component
{
    protected $listeners = ['test'];
    public int $teacherId;

    public function mount(int $teacherId)
    {
        $this->teacherId = $teacherId;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.project-add-form');
    }
}
