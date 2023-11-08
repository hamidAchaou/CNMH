<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\InterfaceProjects;

class ProjectController extends Controller
{
    private $projects;
    public function __construct(InterfaceProjects $projects)
    {
        $this->projects = $projects;
    }
    /**
     * Display All Projects.
     */
    public function index()
    {
        $projects = $this->projects->getAll();
        return view('projects.index', compact('projects'));
    }
    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        return view("projects.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inputs validation
        $request->validate([
            'Name' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);
    
        $name = strip_tags($request->input('Name'));
        $description = strip_tags($request->input('description'));
        $startDate = strip_tags($request->input('startDate'));
        $endDate = strip_tags($request->input('endDate'));
    
        $data = [
            'name' => $name,
            'description' => $description,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];
    
        $this->projects->create($data);
    
        return redirect()->route('projects.index')->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("projects.edit", compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);
    
    
        // $name = strip_tags($request->input('Name'));
        $name = $request->input('name');
        $description = strip_tags($request->input('description'));
        $startDate = strip_tags($request->input('startDate'));
        $endDate = strip_tags($request->input('endDate'));
    
        $data = [
            'name' => $name,
            'description' => $description,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];
    
        $this->projects->update($data, $id);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('projectId');
        
        if ($id) {
            $this->projects->delete($id);
        }
    
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
