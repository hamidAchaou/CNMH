<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\RepositoryTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $repositoryTask;
    public function __construct(RepositoryTask $repositoryTask)
    {
        $this->repositoryTask = $repositoryTask;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = $this->repositoryTask->find($id);
        return view('projects.tasks.create', );
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

        redirect()->route('projects.show', ['id' => $id]);
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
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
