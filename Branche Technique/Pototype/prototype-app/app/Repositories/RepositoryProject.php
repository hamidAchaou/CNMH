<?php
namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectInterface;

class RepositoryProject implements ProjectInterface {
  public function getAll()
  {
    $projects = Project::paginate(2);
    return $projects;
  }
  
  public function getProjectsNameId()
  {
      // $projects = Project::select('id', 'name')->get();
      $projects = Project::all();
      return $projects;
  }

  public function getFirstProject()
  {
      $firstProject = Project::first();
      return $firstProject;
  }
  
  
  

    // find One Project
    public function find($id)
    {
      $project = Project::findOrFail($id);
      return $project;
    }

    // show One Project    
    public function show($id)
    {
        // Assuming Project is your Eloquent model
        $project = Project::findOrFail($id);
        return $project;
    }

  // create new Projects
  public function create($data) 
  {
    Project::create($data);
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