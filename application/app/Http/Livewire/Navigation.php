<?php

namespace App\Http\Livewire;

use App\Repositories\TeacherRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{
    public function render(TeacherRepository $teacherRepo): Factory|View|Application
    {
        return view('livewire.navigation', ['teacher' => $teacherRepo->getDataByWhere('user_id', Auth::id())->first()]);
    }
}
