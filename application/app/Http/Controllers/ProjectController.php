<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(int $id): View|Factory|Application|RedirectResponse
    {
//        TODO maybe add slug move queries to repo?
        $teacherId = (Teacher::where('user_id', Auth::id())->first()->id);
        if (!in_array($id, Project::where('teacher_id', $teacherId)->pluck('id')->toArray())) {
            return back();
        }
        $project = Project::find($id);
        return view('project-page', ['project' => $project]);
    }
}
