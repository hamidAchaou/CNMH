<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class TaskImport implements ToModel
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
            'project_id' => 'required',
        ];

        $rules['name'] = Rule::unique('tasks', 'name')->where(function ($query) use ($row) {
            return $query->where('project_id', $row['project_id']);
        });

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
            return null;
        }

        $existingTask = Task::where([
            'name' => $row['name'],
            'project_id' => $row['project_id'],
        ])->first();

        if ($existingTask) {
            return null;
        }

        return new Task([
            'name' => $row['name'],
            'description' => $row['description'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
            'project_id' => $row['project_id'],
        ]);
    }
}
