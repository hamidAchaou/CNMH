<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interfaces\ProjectInterface;
use App\Repositories\Interfaces\TaskInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $taskInterface;
    private $projectInterface;
    public function __construct(TaskInterface $taskInterface, ProjectInterface $projectInterface)
    {
        $this->taskInterface = $taskInterface;
        $this->projectInterface = $projectInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $project = $this->projectInterface->getFirstProject();
        $id = $project->id;

        $tasks = $this->taskInterface->getAll($id);
        $projects = $this->projectInterface->getProjectsNameId($id);

        if($request->ajax()) {
            $project_Id = $request->get('project');
            $tasks = $this->taskInterface->getAll($project_Id);

            // return view('projects.tasks.search-tasks', compact('tasks'))->render();
            
            // return response()->json(['tasks'=>$project]);
            return response()->json(['tasks' => $tasks]);
        }       

        return view('projects.tasks.index', compact('project', 'tasks', 'projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // $project = $this->taskInterface->find($id);
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
        
        $this->taskInterface->create($data);

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
        $tasks = $this->taskInterface->find($id);
        return view('projects.tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:34',
            'description' => 'nullable|max:555',
        ]);
        

        $data = $request->only('name', 'description');
        $this->taskInterface->update($data, $id);

        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $task_Id = $request->input('task_Id');
        $this->taskInterface->delete($task_Id);

        $project_Id = request()->input('project_Id');
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task deleted successfully');
    }

    // filter task 
    // public function filterTasks(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $projectId = $request->get('projectId');

    //         // Assuming you have a Task model with a relationship to projects
    //         $tasks = Task::where('project_id', $projectId)->get();

    //         // return view('tasks.filtered_tasks', compact('tasks'))->render();
    //         return view('projects.tasks.search-tasks', compact('tasks'))->render();

    //     }

    //     // Return an error message or handle non-ajax requests differently if needed
    //     return response()->json(['error' => 'Invalid request']);
    // }
}
