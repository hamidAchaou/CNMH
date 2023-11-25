<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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
        $projects = Project::paginate(4);

        return view('projects.index', compact('projects'));
    }


}
