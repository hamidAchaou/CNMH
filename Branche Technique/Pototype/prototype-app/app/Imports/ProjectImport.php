<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class ProjectImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            return new Project([
                'name'     => $row["nom"],
                'description'    => $row["description"],
            ]);
        } catch (\ErrorException  $e) {
            return redirect()->route('projects.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }

    }
}
