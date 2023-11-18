<?php
namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectInterface;

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
  public function create($data) 
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
// delte project
public function delete($id)
{
  $project = $this->find($id);
  $project->delete();
}

// project search
public function search(string $searchValue) {
  $projects = Project::query()
      ->where('name', 'LIKE', '%' . $searchValue . '%')
      ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
      ->paginate(4);

  return $projects;
}

}