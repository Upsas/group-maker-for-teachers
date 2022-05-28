<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentRepository extends AbstractRepository
{
    protected function setModel(): void
    {
        $this->model = new Student();
    }

    public function delete(int $id)
    {
        $model = $this->find($id);
        $model->groups()->detach();
        $model->projects()->detach();
        $model->delete();
    }

    public function createStudentWithProject(array $validatedData): Student|Model
    {
        $fullName = $validatedData['full_name'];
        $student = $this->where('full_name', $fullName)->withTrashed()->first();
        if ($student?->trashed()) {
            $student->restore();
        }

//        If student doesn't exist create new and attach to project
        if (!$student) {
            $createdModel = $this->model::create(['full_name' => $fullName]);
            $createdModel->projects()->attach($validatedData['project_id']);
            return $createdModel;
        }

//        Else attach student to project
        $student->projects()->attach($validatedData['project_id']);
        return $student;
    }
}
