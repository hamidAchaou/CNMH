<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Repositories\Interface\ProjectInterface;
use App\Repositories\RepositoryTask;
use App\Repository\ProjectsRepository;
use App\Repository\TasksRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $tasksRepository;
    protected $projectsRepository;

    public function __construct(TasksRepository $tasksRepository, ProjectsRepository $projectsRepository)
    {
        $this->tasksRepository = $tasksRepository;
        $this->projectsRepository = $projectsRepository;
    }
/**
 * Display a listing of the resource.
 */
public function index(Request $request)
{
    if ($request->ajax()) {
        $projectId = $request->get("projectId");

        $tasks = $this->tasksRepository->getByProjectId($projectId);
        return view('tasks.search', compact('tasks'))->render();
    } else {
        $projects = $this->projectsRepository->getAll();
    
        // Default to the first project's tasks
        $project = $projects->first();
        $idProject = $project->id;
    
        if ($request->filled('projectId')) {
            $idProject = $request->input('projectId');
            $project = $this->projectsRepository->find($idProject);
        }
    
        $tasks = $this->tasksRepository->getByProjectId($idProject);
    
    
        return view('tasks.index', compact('projects', 'project', 'tasks'));
    }

}


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = $this->tasksRepository->find($id);
        return view('tasks.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'project_Id' => 'int',
        ]);

        $this->tasksRepository->create($data);
        return redirect()->route('tasks.show', ['id' => $id])->with('success', 'Task added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        // get data with search
        if ($request->ajax()) {
            $searchValue = $request->get("searchValue");
            $searchValue = str_replace(' ', '%' , $searchValue);
    
            $tasks = $this->tasksRepository->searchTasks($searchValue);
    
            return view('tasks.search', compact('tasks'))->render();
        }
    
        $project = $this->projectsRepository->find($id);
        $tasks = $this->tasksRepository->getByProjectId($id);
        return view('tasks.show', compact('project', 'tasks'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = $this->tasksRepository->find($id);
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:34',
            'description' => 'nullable|max:555',
        ]);

        $this->tasksRepository->update($data, $id);


        $project_Id = request()->input('project_Id');
        return redirect()->route('tasks.show', ['id' => $project_Id])->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('task_id');

        $result = $this->tasksRepository->destroy($id);
        // dd($result);

        if ($result) {
            return redirect()->route('tasks.index')->with('success', 'La tâche a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de la tâche.');
        }
    }
}
