<?php

namespace App\Http\Livewire;

use App\Repositories\TeacherRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{
    public function render(TeacherRepository $teacherRepo)
    {
        return view('livewire.navigation', ['teacher' => $teacherRepo->getDataByWhere('user_id', Auth::id())->first()]);
    }
}
