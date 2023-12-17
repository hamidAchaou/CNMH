<?php

namespace App\Http\Controllers;

use App\Exports\ProjectExport;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Imports\ImportProject;
use App\Models\Project;
use App\Repository\ProjectRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProjectsController extends AppBaseController
{
    protected $ProjectRepository;

    public function __construct(ProjectRepository $ProjectRepository){
        $this->ProjectRepository = $ProjectRepository;
    }

    public function index(Request $request){
        
        $projects = $this->ProjectRepository->getData();

        if($request->ajax()){
            $searchProject = $request->get('searchProject');
            $searchProject = str_replace(" ", "%", $searchProject);
            $projects = Project::where(function ($query) use ($searchProject) {
                $query->where('name', 'like', '%' . $searchProject . '%')
                      ->orWhere('description','like','%'. $searchProject . '%');
            })
            ->paginate(3);
            return view('project.search', compact('projects'))->render();

        }


        return view('project.index', compact('projects'));
    }
    
    public function create(){
        return view('project.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();

        $projects = $this->ProjectRepository->create($validatedData);

        return redirect()->route('projects.index')->with('success','Project added successfully.');

    }

    public function edit($id){
        $project = $this->ProjectRepository->find($id);

        return view('project.edit',compact('project'));

    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $validatedData = $request->validated();

        $projects = $this->ProjectRepository->update($validatedData,$id);

        return redirect()->route('projects.index')->with('success','Project Update successfully.');

    }

    public function destroy($id){
        $result = $this->ProjectRepository->destroy($id);
    
        if ($result) {
            return redirect()->route('projects.index')->with('success', 'Project has been removed successfully.');
        } else {
            return back()->with('error', 'Failed to remove project. Please try again.');
        }
    }

    public function export()
    {
        return Excel::download(new ProjectExport, 'Project.xlsx');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportProject, $path);
        }
        
        return redirect()->back();
    }
    
}
