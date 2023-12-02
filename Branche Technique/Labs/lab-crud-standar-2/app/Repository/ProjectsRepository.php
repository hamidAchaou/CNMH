<?php
namespace App\Repository;

use App\Models\Project;
use App\Repository\BasRepository;

class ProjectsRepository extends BasRepository {
   protected $model;
   
   public function __construct(Project $projects)
   {
    $this->model = $projects;
   }

   protected $feildsProjects = [
    'nom',
    'description',
   ];

  public function getFeildsData() :array
  {
    return $this->feildsProjects;
  }

  public function model() :string
  {
    return Project::class;
  }

  public function searchProjects($searchValue, $perPage = 4)
{
    return $this->model
        ->where('name', 'LIKE', '%' . $searchValue . '%')
        ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
        ->paginate($perPage);
}

}