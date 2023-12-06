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
        Gate::authorize('index-tasks');
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
     * display form Create tasks
     */
    public function create(){
        Gate::authorize('create-tasks');
        $projects = Project::all();
        return view('tasks.create' , compact('projects'));
    }

    public function store(Request $request){
        Gate::authorize('store-tasks');
        try {
            $validatedData = $request->validate([
                'nom' => 'required|max:50',
                'projetId' => 'required',
            ]);
    
            Task::create($validatedData);
            return redirect()->route('tasks.create')->with('success' , 'Tâche a été ajoutée avec succès');
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }
    

    /**
     * show form Edit tasks
     */
    public function edit($id){
        Gate::authorize('edit-tasks');
        $task = Task::findOrFail($id);
        $projects = Project::all();
        return view('tasks.edit' , compact('task' , 'projects'));
    }

    /**
     * Update tasks
     */
    public function update(Request $request , $id){
        Gate::authorize('update-tasks');
        $task = Task::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'required'
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success' , 'tache a été modifier avec succés');
    }

    /**
     * Delete tasks
     */
    public function destroy($id)
    {
        Gate::authorize('destroy-tasks');
        // Logic to find and delete the task with the given ID
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    
        $task->delete();
    
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    
}
