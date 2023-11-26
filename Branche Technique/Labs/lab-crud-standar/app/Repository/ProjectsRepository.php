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
    'name', 
    'descrption',
   ];

  public function getFeildsData() :array
  {
    return $this->feildsProjects;
  }

  public function model() :string
  {
    return Project::class;
  }
}