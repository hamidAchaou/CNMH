<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TaskRepository;
use App\Repository\ProjectRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TaskExport;
use App\Imports\ImportTask;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TasksController extends AppBaseController
{
    protected $TaskRepository;
    protected $ProjectRepository;

    public function __construct(TaskRepository $TaskRepository, ProjectRepository $ProjectRepository){
        $this->TaskRepository = $TaskRepository;
        $this->ProjectRepository = $ProjectRepository;

    }

    // public function index(Request $request, $id)
    // {
    //     $projects = $this->ProjectRepository->getData();
    //     $project = $this->ProjectRepository->find($id);

    //     $tasksQuery = $project->tasks();

    //     if ($request->ajax()) {
            
    //         $searchTask = $request->get('searchTask');
    //         $searchTask = str_replace(" ", "%", $searchTask);

    //         $tasksQuery->where(function ($query) use ($searchTask) {
    //             $query->where('name', 'like', '%' . $searchTask . '%')
    //                 ->orWhere('description', 'like', '%' . $searchTask . '%');
    //         });

    //         $tasks = $tasksQuery->paginate(3);

    //         return view('task.search', compact('tasks', 'project'))->render();
    //     }

    //     $tasks = $tasksQuery->paginate(3);

    //     return view('tasks.index', compact('tasks', 'projects', 'project'));
    // }

    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            dd($request->get('searchValue'));
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ', '%', $seachQuery);
            $tasks = $this->TaskRepository->searchTasks($seachQuery);
            
            
            $projectId = $request->get('criteria');
            if ($projectId) {
                $tasks = $this->TaskRepository->getByProjectId($projectId);
            }
            return view('tasks.search', compact('tasks'))->render();
        }
    
        $projects = $this->ProjectRepository->getData();
        $project = null;
        $tasks = [];
    
        $id = $request->id;
        if ($id) {
            $project = $this->ProjectRepository->find($id);
            $tasks = $this->TaskRepository->getByProjectId($id);
        }
    
        $projects = $this->ProjectRepository->getData();
        $projects = $this->ProjectRepository->getData();
        return view('tasks.index', compact('tasks', 'projects', 'project'));
    }
    

    public function getTasksByProject(Request $request)
    {
        $projects = $this->ProjectRepository->getData();
        $project = $projects->first();
        $projectsId = $project->id;
        // dd($projectsId);
        $tasks = $this->TaskRepository->getByProjectId($projectsId);
        
        return view('tasks.index', compact('project', 'tasks', 'projects'));
    }
    
    

    public function create($id){

        $projects = $this->ProjectRepository->getData();
        return view('tasks.create', compact('projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();
    
        $id = $validatedData['project_id'];
    
        $task = $this->TaskRepository->create($validatedData);
        return redirect()->route('tasks.index', compact('id'))->with('success', 'La tâche a été ajoutée avec succès');
    }
    

    public function edit($id, $task_id){

        $task = $this->TaskRepository->find($task_id);

        $project = $this->ProjectRepository->find($id);

        return view('tasks.edit',compact('task','project'));

    }

    public function update(Request $request, $id, $task_id){
        $data = $request->validate([
            'name'=> 'required',
            'description' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'project_id' => 'required',
        ]);

        $task = $this->TaskRepository->update($data, $task_id);
        return back()->with('success','Task updated successfully.');
    }
    

    public function destroy($id, $task_id)
    {
        $result = $this->TaskRepository->destroy($task_id);

        if ($result) {
            return back()->with('success', 'Task has been removed successfully.');
        } else {
            return back()->with('error', 'Failed to remove task. Please try again.');
        }
    }


    public function export()
    {
        return Excel::download(new TaskExport, 'Task.xlsx');
    }

    public function import(Request $request)
    {
       
        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportTask, $path);
        }
        
        return redirect()->back();
    }
    
}