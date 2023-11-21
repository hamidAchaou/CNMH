<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interface\ProjectInterface;
use App\Repositories\RepositoryTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $repositoryTask;
    private $projectInterface;
    public function __construct(RepositoryTask $repositoryTask, ProjectInterface $projectInterface)
    {
        $this->repositoryTask = $repositoryTask;
        $this->projectInterface = $projectInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectInterface->getAll();
        $project = $projects[0];
        // get tasks this project
        // $idProject = $project->id;
        // $tasks = $this->repositoryTask->getAll($idProject);
        return view('projects.tasks.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // $project = $this->repositoryTask->find($id);
        return view('projects.tasks.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        // dd($request->project_Id);
        $data = $request->only('name', 'description', 'project_Id');
        
        $this->repositoryTask->create($data);

        return redirect()->route('projects.show', ['id' => $id])->with('success', 'Task added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = $this->repositoryTask->find($id);
        return view('projects.tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'require|max:34',
            'name' => 'nullable|max:555',
        ]);

        $data = $request->only('name', 'description');
        $this->repositoryTask->update($data, $id);

        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $task_Id = $request->input('task_Id');
        $this->repositoryTask->delete($task_Id);

        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task deleted successfully');
    }
}
