<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class ProjectImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];

        $rules['name'] = Rule::unique('projects', 'name');

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        $existingProject = Project::where('name', $row['name'])->first();

        if ($existingProject) {
            return null;
        }

        return new Project([
            'name' => $row['name'],
            'description' => $row['description'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
        ]);
    }
}
