<?php

namespace App\Http\Requests;

use App\Repositories\ProjectRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentStoreRequest extends FormRequest
{
    public function __construct(private ProjectRepository $projectRepo)
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
        $students = $this->projectRepo->find($this->request->get('project_id'))
            ?->students()
            ->pluck('full_name')
            ->toArray();

        return [
            'full_name' => ['string', 'required', 'not_regex:/[0-9]/', Rule::notIn($students)],
            'project_id' => ['required', 'exists:projects,id']
        ];
    }

    public function messages(): array
    {
        return [
            'not_regex' => "Numbers in name is not allowed",
            'not_in' => 'Full name is not unique',
        ];
    }
}
