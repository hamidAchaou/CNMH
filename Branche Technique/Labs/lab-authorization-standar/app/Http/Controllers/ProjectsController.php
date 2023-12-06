<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectsController extends Controller
{
    /**
     * Display a Projects By Route and By ajax.
     */
    public function index(Request $request){
        Gate::authorize('index-tasks');

        if($request->ajax()){
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $projects = Project::query()->where('nom','like','%'.$seachQuery. '%')
                                  ->orWhere('description' , 'like' , '%' . $seachQuery . '%')
                                  ->paginate(3);

            return view('projects.search' , compact('projects'))->render();
        }

        $projects = Project::paginate(3);
        return view('projects.index',compact('projects'));
    }

    /**
     * Display the Tasks By Projects.
     */
    public function show(string $id)
    {
        Gate::authorize('index-tasks');
        $project = Project::findOrFail($id);
        $tasks = Task::where('projetId', $id)->paginate(4);
        return view('projects.show', compact('project', 'tasks'));
    }
}
