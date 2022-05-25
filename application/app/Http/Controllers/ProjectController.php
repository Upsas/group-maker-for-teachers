<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Repositories\ProjectRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct(
        private TeacherRepository $teacherRepo,
        private ProjectRepository $projectRepo
    ) {
    }

    public function index(int $id): View|Factory|Application|RedirectResponse
    {
//        TODO maybe add slug
        $teacherId = $this->teacherRepo->where('user_id', Auth::id())->first()->id;
        if (!in_array($id, $this->projectRepo->where('teacher_id', $teacherId)->pluck('id')->toArray())) {
            return back();
        }

        return view('project-page', ['project' => $this->projectRepo->find($id)]);
    }

    public function create(ProjectCreateRequest $request): RedirectResponse
    {
        $this->projectRepo->createProjectWithGroups($request->validated());

        return back();
    }
}
