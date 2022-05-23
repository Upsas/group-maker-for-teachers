<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectAddForm extends Component
{
    protected $listeners = ['test'];

    public function render()
    {
        return view('livewire.project-add-form');
    }
    public function test()
    {
    }
}
