<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;


class TasksController extends Controller
{

    /**
     * Get All tasks
     */
    public function index(Request $request){
        if($request->ajax()){
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $tasks = Task::query()->where('nom','like','%'.$seachQuery. '%')
                                  ->orWhere('description' , 'like' , '%' . $seachQuery . '%')
                                  ->paginate(3);

            return view('tasks.search' , compact('tasks'))->render();
        }

        // $tasks = Task::with('projects')->paginate(3);
        $tasks = Task::with('project')->paginate(3);
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Display form to create tasks
     */
    public function create()
    {
        // Check if the user has the 'project-leader' role
        if (Gate::allows('role', 'project-leader') || Gate::allows('create-TasksController')) {
            $projects = Project::all();
            return view('tasks.create', compact('projects'));
        }

        // // Check if the user can create tasks through the 'TasksController' policy
        // if (Gate::allows('create-TasksController')) {
        //     $projects = Project::all();
        //     return view('tasks.create', compact('projects'));
        // }

        // Handle unauthorized access
        abort(403, 'Unauthorized action.');
    }

    public function store(Request $request){
            $validatedData = $request->validate([
                'nom' => 'required|max:50',
                'projetId' => 'required',
                'description' => 'nullable'
            ]);
    
            $task = Task::create($validatedData);
            $project = $task->projetId;
            return redirect()->route('projects.show', compact('project'))->with('success' , 'Tâche a été ajoutée avec succès');
    }
    

    /**
     * show form Edit tasks
     */
    public function edit($id){
        if (Gate::allows('role', 'project-leader') || Gate::allows('create-TasksController')) {
            $task = Task::findOrFail($id);
            $projects = Project::all();
            return view('tasks.edit' , compact('task' , 'projects'));
        }
        abort(403, 'Unauthorized action.');

    }

    /**
     * Update tasks
     */
    public function update(Request $request , $id){
        $task = Task::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'nullable'
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success' , 'tache a été modifier avec succés');
    }

    /**
     * Delete tasks
     */
    public function destroy($id)
    {
        // Logic to find and delete the task with the given ID
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    
        $task->delete();
    
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    
}
