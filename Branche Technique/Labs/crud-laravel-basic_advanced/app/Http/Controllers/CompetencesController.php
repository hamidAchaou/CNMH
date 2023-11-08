<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetencesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::latest()->paginate(4);
        return view('competences.index', ['competences' => $competences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:competences,Reference',
            'code' => 'required',
            'nom' => 'required',
            'description' => 'required'
        ]);

        $competences = new Competence();

        $competences->Reference = strip_tags($request->input('reference'));
        $competences->Code = strip_tags($request->input('code'));
        $competences->Name = strip_tags($request->input('nom'));
        $competences->Description = strip_tags($request->input('description'));

        $competences->save();

        return redirect()->route('competences.index')->with('success', 'competences added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $competence = Competence::findOrFail($id);
        return view('competences.edit', ['competence' => $competence]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $competence = Competence::findOrFail($id);
        $request->validate([
            'reference' => 'required|unique:competences,Reference,' . $competence->id,
            'code' => 'required',
            'nom' => 'required',
            'description' => 'required',
        ]);
    
        $competence->Reference = strip_tags($request->input('reference'));
        $competence->Code = strip_tags($request->input('code'));
        $competence->Name = strip_tags($request->input('nom'));
        $competence->Description = strip_tags($request->input('description'));
    
        $competence->update();
        
        return redirect()->route('competences.index')->with('success', 'Updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $competence = Competence::findOrFail($request->input('id'));
        $competence->delete();
        // Competence::where()->delete();
        return redirect()->route('competences.index')->with('danger', 'your competences Deleted');
    }

    public function searchCompetences(Request $request)
    {
        $searchQuery = $request->input('search');
    
        $results = Competence::where('Name', 'like', '%' . $searchQuery . '%')
            ->orWhere('Code', 'like', '%' . $searchQuery . '%')
            ->paginate(4, ['*'], 'page', 1);
    
        return response()->json([
            'data' => $results->items(),
            'links' => $results->links('pagination::bootstrap-5')->toHtml(),
        ]);
    }
    
}
