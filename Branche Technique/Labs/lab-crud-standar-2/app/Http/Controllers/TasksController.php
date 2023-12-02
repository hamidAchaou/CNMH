<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Repository\ProjectsRepository;
use App\Repository\TasksRepository;

class TasksController extends Controller
{
    protected $tasksRepository;
    protected $projectsRepository;

    public function __construct(TasksRepository $tasksRepository, ProjectsRepository $projectsRepository)
    {
        $this->tasksRepository = $tasksRepository;
        $this->projectsRepository = $projectsRepository;
    }

    /**
     * Get All tasks
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ', '%', $seachQuery);
            $tasks = $this->tasksRepository->searchTasks($seachQuery);
            
            
            $projectId = $request->get('criteria');
            if ($projectId) {
                $tasks = $this->tasksRepository->getByProjectId($projectId);
            }
            return view('tasks.search', compact('tasks'))->render();
        }

        $projects = $this->projectsRepository->getAll();
        $tasks = $this->tasksRepository->getAll();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * display form Create tasks
     */
    public function create()
    {
        $projects = $this->projectsRepository->getAll();
        return view('tasks.create', compact('projects'));
    }

    /**
     * create tasks
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
            'projetId' => 'required',
            'description' => 'required'
        ]);

        $task = $this->tasksRepository->create($validatedData);
        return redirect()->route('tasks.create')->with('success', 'tache a été ajouter avec succés');
    }

    /**
     * show form Edit tasks
     */
    public function edit($id)
    {
        $task = $this->tasksRepository->find($id);
        $projects = $this->projectsRepository->getAll();
        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update tasks
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
            'description' => 'required',
            'projetId' => 'required',
        ]);

        // dd($validatedData);
        $this->tasksRepository->update($validatedData, $id);

        return redirect()->route('tasks.index')->with('success', 'tache a été modifier avec succés');
    }

    /**
     * Delete tasks
     */
    public function destroy($id)
    {
        $this->tasksRepository->destroy($id);
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès !');
    }
}
