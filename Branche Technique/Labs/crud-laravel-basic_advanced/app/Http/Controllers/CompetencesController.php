<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Repositories\Interfaces\InterfaceCompetences;
use Illuminate\Http\Request;

class CompetencesController extends Controller
{
    private $competences;

    public function __construct(InterfaceCompetences $competences)
    {
        $this->competences = $competences;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = $this->competences->getAll();
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
        // validation input
        $request->validate([
            'reference' => 'required|unique:competences,Reference',
            'code' => 'required',
            'nom' => 'required',
            'description' => 'required'
        ]);
        
        $data = $request->only(['reference', 'code', 'nom', 'description']); // store data input in array data
        $this->competences->create($data); // send data in class Competences Repositories
        return redirect()->route('competences.index')->with('success', 'competences added successfully'); // redirect in page index
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
        $request->validate([
            'reference' => 'required|unique:competences,Reference',
            'code' => 'required',
            'nom' => 'required',
            'description' => 'required',
        ]);
    
        $data = $request->only(['reference', 'code', 'nom', 'description']);
        $result = $this->competences->update($id, $data);
    
        if ($result) {
            return redirect()->route('competences.index')->with('success', 'Updated successfully');
        }
    
        return redirect()->route('competences.index')->with('danger', 'This competence does not exist');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = strip_tags($request->input('id'));
        $this->competences->delete($id);

        return redirect()->route('competences.index')->with('danger', 'your competences Deleted');
    }

    public function searchCompetences(Request $request)
    {
        $datasearch = $request->input('search');
    
        $results = $this->competences->search($datasearch);
    
        return response()->json([
            'data' => $results->items(),
            'links' => $results->links()->toHtml(),
        ]);
    }
    
}
