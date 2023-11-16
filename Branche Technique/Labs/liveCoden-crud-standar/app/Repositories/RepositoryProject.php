<?php
namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interface\ProjectInterface;

class RepositoryProject implements ProjectInterface {
  public function getAll()
  {
    $projects = Project::paginate(4);
    return $projects;
  }

    // show One Project
    public function show($id)
    {
      $project = Project::with('task')->findOrFail($id);
      return $project;
    }

  // create new Projects
  public function create(array $data) 
  {
    Project::create($data);
  }

  // find One Project
  public function find($id)
  {
    $project = Project::findOrFail($id);
    return $project;
  }

// Update Projects
public function update(array $data, $id)
{
    $project = $this->find($id);

    if ($project) {
        $project->update($data);
        return $project;
    }

    abort(404);
}

}