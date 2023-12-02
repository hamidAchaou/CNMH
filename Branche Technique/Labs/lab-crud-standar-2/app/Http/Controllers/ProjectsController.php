<?php

namespace App\Http\Controllers;

use App\Repository\ProjectsRepository;
use App\Repository\TasksRepository;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable|max:555',
        ]);

        $nameProject = $request->nom;
        $data = $request->only(['nom', 'description']);
        $result = $this->projectsRepository->create($data);

        return redirect()->route('projects.index')->with('success', "Le projet $nameProject  a été ajouté avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = $this->projectsRepository->getAll();
        
        $project = $this->projectsRepository->find($id);

        $tasks = $this->tasksRepository->getByProjectId($id);
        return view('projects.show', compact('projects', 'project', 'tasks'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|max:33',
            'description' => 'nullable|max:455',
        ]);
        

        $data = $request->only(['nom', 'description']);
        $this->projectsRepository->update($data, $id);

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
