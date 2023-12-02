<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a Projects By Route and By ajax.
     */
    public function index(Request $request){

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
        $project = Project::findOrFail($id);
        $tasks = Task::where('projetId', $id)->paginate(4);
        return view('projects.show', compact('project', 'tasks'));
    }
}
