<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\Interface\ProjectInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectInterface;

    public function __construct(ProjectInterface $projectInterface)
    {
        return $this->projectInterface = $projectInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectInterface->getAll();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:555',
        ]);

        $data = $request->only(['name', 'description']);
        $result = $this->projectInterface->create($data);

        return redirect()->route('projects.index')->with('success', "Projects added successfally");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = $this->projectInterface->show($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = $this->projectInterface->find($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:33',
            'description' => 'nullable|max455',
        ]);

        $data = $request->only(['name', 'description']);
        $this->projectInterface->update($data, $id);

        return redirect()->route('projects.index')->with('success', 'projects edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
