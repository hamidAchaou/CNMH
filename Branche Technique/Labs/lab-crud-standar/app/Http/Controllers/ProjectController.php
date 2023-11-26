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
        if ($request->ajax()) {
            $searchValue = $request->get("searchValue");
            $searchValue = str_replace(' ', '%' , $searchValue);
    
            $projects = $this->projects->searchProjects($searchValue);
    
            return view('projects.search', compact('projects'))->render();
        }
    
        // get all projects without search
        $projects = $this->projects->getAll();
    
        return view('projects.index', compact('projects'));
    }
    


}
