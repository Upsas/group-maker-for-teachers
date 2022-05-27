<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FlashMessage extends Component
{
    public $flashMessageDisplay = 'hidden';
    public $message = '';
    public $bgColor = 'bg-green-400';

    protected $listeners = ['renderFlashMessage'];

    public function renderFlashMessage($message)
    {
        $this->flashMessageDisplay = 'block';
        $this->message = $message;
        $this->dispatchBrowserEvent('renderFlashMessage');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.flash-message');
    }
}
