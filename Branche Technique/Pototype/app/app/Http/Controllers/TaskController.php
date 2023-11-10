<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interfaces\InterfaceTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
private $task;
public function __construct(InterfaceTask $task)
{
    $this->task = $task;
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

        $this->task->add($data);
        
        return redirect()->route('projects.index')->with('success', 'Task added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = $this->task->find($id);
        return view('projects.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:400',
        ]);
    
        $title = $request->input('title');
        $description = $request->input('description');
 
        $data = [
            'title' => $title,
            'description' => $description,
        ];
    
        $this->task->update($data, $id);
        
        return redirect()->route('projects.index')->with('success', 'Task edited successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('taskId');

        $this->task->delete($id);

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

    $this->task->update($data, $id);

    return response()->json(['message' => 'Task status updated successfully']);
}
}
