<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract protected function setModel(): void;

    /**
     * Do not use this function if user will write columnName and operator
     * @param string $columnName
     * @param string $value
     * @param string $operator
     * @return Builder
     */
    public function where(string $columnName, string $value, string $operator = '='): Builder|null
    {
        return $this->model::where($columnName, $operator, $value);
    }

    public function find(int $id): Model|null
    {
        return $this->model::find($id);
    }

    public function create(array $validatedData)
    {
        return $this->model::create($validatedData);
    }
}
