<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Group;
use App\Models\Project;

class ProjectRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function setModel(): void
    {
        $this->model = new Project();
    }

    public function createProjectWithGroups(array $validatedData)
    {

        $storedProject = Project::create($validatedData);

        for ($i = 1; $i <= $validatedData['groups']; $i++) {
            Group::create(['group_index' => $i, 'project_id' => $storedProject->id]);
        }
    }
}
