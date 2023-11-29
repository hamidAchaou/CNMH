<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

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

        $tasks = Task::paginate(3);
        return view('tasks.index',compact('tasks'));
    }

    /**
     * display form Create tasks
     */
    public function create(){
    $projects = Project::all();
        return view('tasks.create' , compact('projects'));
    }

    /**
     * create tasks
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
            'projetId' => 'required',
            'description' => 'required'
        ]);

        Task::create($validatedData);
        return redirect()->route('tasks.create')->with('success' , 'tache a été ajouter avec succés');
    }

    /**
     * show form Edit tasks
     */
    public function edit($id){
        $task = Task::findOrFail($id);
        $projects = Project::all();
        return view('tasks.edit' , compact('task' , 'projects'));
    }

    /**
     * Update tasks
     */
    public function update(Request $request , $id){
        $task = Task::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'required'
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.edit' , ['id' => $task->id])->with('success' , 'tache a été modifier avec succés');
    }

    /**
     * Delete tasks
     */
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès !');
    }
}
