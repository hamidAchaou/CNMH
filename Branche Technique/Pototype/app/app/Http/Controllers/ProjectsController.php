<?php

namespace App\Http\Controllers;

use App\Repository\ProjectsRepository;
use App\Repository\TasksRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectsController extends Controller
{
    protected $tasksRepository;
    protected $projectsRepository;

    public function __construct(TasksRepository $tasksRepository, ProjectsRepository $projectsRepository)
    {
        $this->tasksRepository = $tasksRepository;
        $this->projectsRepository = $projectsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

        if($request->ajax()){
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $projects = $this->projectsRepository->searchProjects($seachQuery);

            return view('projects.search' , compact('projects'))->render();
        }

        $projects = $this->projectsRepository->getAll();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated(); 

        $nameProject = $validatedData['name'];
        $result = $this->projectsRepository->create($validatedData);

        return redirect()->route('projects.index')->with('success', "Le projet $nameProject a été ajouté avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = $this->projectsRepository->find($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $validatedData = $request->validated(); 

        $this->projectsRepository->update($validatedData, $id);

        return redirect()->route('projects.index')->with('success', 'Projets modifiés avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->projectsRepository->destroy($id);
        return redirect()->route('projects.index')->with('success', 'Projet supprimée avec succès !');
    }
}
