<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository extends AbstractRepository
{
    protected function setModel(): void
    {
        $this->model = new Teacher();
    }
}
