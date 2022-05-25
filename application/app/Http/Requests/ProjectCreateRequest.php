<?php

namespace App\Http\Requests;

use App\Repositories\TeacherRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectCreateRequest extends FormRequest
{
    public function __construct(private TeacherRepository $teacherRepo)
    {
        parent::__construct();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $currentTeacherId = (string) $this->teacherRepo->where('user_id', Auth::id())->first()->id;
        return [
            'name' => ['string', 'required', 'max:255'],
            'groups' => ['integer', 'digits_between:1,999', 'required', 'numeric'],
            'students_per_group' => ['integer', 'digits_between:1,50', 'required', 'numeric'],
            'teacher_id' => ['required', 'numeric', "in:$currentTeacherId"]
        ];
    }
}
