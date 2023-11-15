<?php
namespace App\Repositories;

use App\Repositories\Interfaces\InterfaceCompetences;

use App\Models\Competence;

class CompetencesRepository implements InterfaceCompetences  {
    public function getAll() {
        $competences = Competence::latest()->paginate(4);
        return $competences;
    }

    public function create(array $data) {
        Competence::create($data);   
    }

    // find Competences where Id is existe
    public function find(int $id) {
        return Competence::findOrFail($id);
    }
    
    // update Competences
    public function update($id, array $data)
    {
        $datacompetence = $this->find($id);
    
        if ($datacompetence) {
            $datacompetence->update($data); // Use update method on the model
            return true; // Indicate success
        }
    
        return false; // Indicate that the competence was not found
    }   

    public function delete($id) {
        $competence = $this->find($id);
    
        if ($competence) {
            $competence->delete();
        }
    }
    
    // search competences
    public function search($dataSearch) {

        $results = Competence::where('Name', 'like', '%' . $dataSearch . '%')
        ->orWhere('Code', 'like', '%' . $dataSearch . '%')
        ->paginate(4);
        return $results;
    }
    
} 