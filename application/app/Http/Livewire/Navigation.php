<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{
    private Model|Teacher $teacher;

    public function mount(TeacherRepository $teacherRepo): void
    {
        $this->teacher = $teacherRepo->where('user_id', Auth::id())->first();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.navigation', ['teacher' => $this->teacher, 'teacherId' => $this->teacher->id]);
    }
}
