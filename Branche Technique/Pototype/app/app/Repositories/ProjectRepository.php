<?php

namespace App\Repositories;


use App\Repositories\Interfaces\InterfaceProjects;
use App\Models\Project;
use App\Models\Task;

class ProjectRepository implements InterfaceProjects {
    // get All projects
    public function getAll($perPage = 3) {
        return Project::with('tasks')->paginate($perPage);
    }

    // get All Name Projects
    public function getNameProjects() {
        return Project::select('id', 'name')->get();
    }
    
    // Project find
    public function find($id)
    {
        return Project::with('tasks')->find($id);
    }

    // get Tasks Pagination
    public function getTasksPaginated($id, $perPage = 4)
    {
        return Project::findOrFail($id)->tasks()->paginate($perPage);
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
    public function delete($id) {
        $project = $this->find($id);;

        if($project) {
            $project->delete();
            return true;
        }
        return false;
    }

    // search Projects
    public function search($dataSearch) {

        $results = Project::where('name', 'like', '%' . $dataSearch . '%')
        ->orWhere('description', 'like', '%' . $dataSearch . '%')
        ->paginate(4);
        return $results;
    }

}
?>