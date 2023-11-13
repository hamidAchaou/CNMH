<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interfaces\InterfaceTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * get Interface Tasks
     */
    private $InterfaceTask;
    public function __construct(InterfaceTask $InterfaceTask)
    {
        $this->InterfaceTask = $InterfaceTask;
    }

    /**
     * Display All Tasks.
     */
    public function index($id)
    {
        $tasks = $this->InterfaceTask->getAll($id);
        return view('projects.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new Task.
     */
    public function create($id)
    {
        return view("projects.tasks.create", compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'project_Id' => 'integer',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $project_Id = $request->input('project_Id');
 
        $data = [
            'title' => $title,
            'description' => $description,
            'project_Id' => $project_Id
        ];

        $this->InterfaceTask->add($data);
        
        return redirect()->route('projects.show', ['id' => $project_Id])->with('success', 'Task added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->InterfaceTask->find($id);
        return view('projects.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        $title = $request->input('title');
        $description = $request->input('description');
    
        $data = [
            'title' => $title,
            'description' => $description,
        ];
    
        $this->InterfaceTask->update($data, $id);
    
        // Redirect to the project's show page
        $task = $this->InterfaceTask->find($id);
        if ($task) {
            return redirect()->route('projects.show', ['id' => $task->project_Id])->with('success', 'Task updated successfully');
        } else {
            // Handle the case where the task is not found
            return redirect()->back()->with('error', 'Task not found');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('taskId');

        $this->InterfaceTask->delete($id);

        return redirect()->route('projects.index')->with('success', 'Task deleted successfully');

    }
/**
 * Add status tasks.
 */
public function addStatusTask(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:done,pending',
    ]);

    $status = $request->input('status');

    $data = [
        'status' => $status,
    ];

    $this->InterfaceTask->update($data, $id);

    return response()->json(['message' => 'Task status updated successfully']);
}
}
