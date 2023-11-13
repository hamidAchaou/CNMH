<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\InterfaceProjects;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Auth\Access\Gate;

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
        $projectsName = $this->projects->getNameProjects(); 

        return view('projects.index', compact('projects', 'projectsName'));
    }
    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        // Gate::authorize('view', new Project);
        $this->authorize('create', new Project);
        return view("projects.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Project);
        // Inputs validation
        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);
        // dd($request);
    
        $name = strip_tags($request->input('name'));
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
    public function show($id)
    {
        $project = $this->projects->find($id);
        $tasks = $this->projects->getTasksPaginated($id, 4);
    
        return view('projects.show', compact('project', 'tasks'));
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Project $project)
    {
        $this->authorize('update', new Project);
        return view("projects.edit", compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
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

    // function search
    public function searchProject(Request $request)
    {
        $datasearch = $request->input('search');
    
        $results = $this->projects->search($datasearch);
    
        return response()->json([
            'data' => $results->items(),
            'links' => $results->links()->toHtml(),
        ]);
    }
}
