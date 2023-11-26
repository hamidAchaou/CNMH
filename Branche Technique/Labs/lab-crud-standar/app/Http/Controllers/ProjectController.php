<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repository\ProjectsRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projects;
    public function __construct(ProjectsRepository $projectsRepository)
    {
        $this->projects = $projectsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get data with search
        if($request->ajax())
        {

            $searchValue = $request->get("searchValue");
            $searchValue = str_replace(' ', '%' , $searchValue);

            $projects = Project::query()
            ->where('name', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
            ->paginate(4);

            return view('projects.search', compact('projects'))->render();
        }

        // get data
        // $projects = Project::paginate(4);
        $projects = $this->projects->getall();

        return view('projects.index', compact('projects'));
    }


}
