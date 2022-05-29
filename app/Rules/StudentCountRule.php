<?php

namespace App\Rules;

use App\Repositories\ProjectRepository;
use Illuminate\Contracts\Validation\Rule;

class StudentCountRule implements Rule
{
    private int $count;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private ProjectRepository $projectRepo)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $project = $this->projectRepo->find(request('project_id'));
        $this->count =  $project->groups * $project->students_per_group;
        return $this->count > count($project->students()->get()->toArray());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "You can not pass student limit ($this->count).";
    }
}
