<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Repositories\Interface\ProjectInterface;
use App\Repositories\RepositoryTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = Project::all();

        $project = $projects[0];
        $idProject = $project->id;

        $tasks = Task::where('project_Id', $idProject)->paginate(1);

        // dd($idProject);

       return view('tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // $project = $this->repositoryTask->find($id);
        return view('tasks.create', ['id' => $id]);
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

        Task::create($data);


        return redirect()->route('projects.show', ['id' => $id])->with('success', 'Task added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task , $id)
    {
        $tasks = Task::where('project_Id' , $id)->paginate(1);
        $project = Project::findOrFail($id);
        return view('tasks.show', compact('project' , 'tasks'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = $this->find($id);
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
        $task = $this->find($id);
        $task->update($data);


        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $task_Id = $request->input('task_Id');

        $task = $this->find($task_Id);
        $task->delete();

        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task deleted successfully');
    }

    // find One tasks
    public function find($id)
    {
        $tasks = Task::findOrfail($id);
        return $tasks;
    }
}
