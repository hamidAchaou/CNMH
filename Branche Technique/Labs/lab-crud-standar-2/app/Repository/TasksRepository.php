<?php

namespace App\Repository;
use App\Repository\BasRepository;
use App\Models\Task;


class TasksRepository extends BasRepository {
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    protected $fieldsTasks = [
        'nom',
        'description',
        'projetId',
    ];

    public function getFeildsData(): array
    {
        return $this->fieldsTasks;
    }

    public function model(): string
    {
        return Task::class;
    }

    public function getByProjectId($projectId, $perPage = 3) {
        return $this->model->where('projetId', $projectId)->paginate($perPage);
    }

    public function searchTasks($searchValue, $perPage = 4)
    {
        return $this->model
            ->where('nom', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
            ->paginate($perPage);
    }

    
}
