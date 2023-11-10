<?php

namespace App\Repositories;


use App\Repositories\Interfaces\InterfaceProjects;
use App\Models\Project;
use App\Models\Task;

class ProjectRepository implements InterfaceProjects {
    public function getAll($perPage = 6) {
        // Use the with method to eager load the 'tasks' relationship
        return Project::with('tasks')->paginate($perPage);
    }

    // find One Project
    public function find($id){
        $project = Project::findOrFail($id);
        return $project;
    }

    // create new Project
    public function create(array $data) {
        Project::create($data);
    }

    // update Project
    public function update(array $data, $id) {
        // $dataProject = Project::findOrFail($id);
        $dataProject = $this->find($id);
        if ($dataProject) {
            $dataProject->update($data);
            return true;
        }
        return false;
    }

    // delete Project
    public function delete(string $id) {
        $project = $this->find($id);;

        if($project) {
            $project->delete();
            return true;
        }
        return false;
    }

}
?>