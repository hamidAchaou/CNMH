<?php

namespace App\Imports;

use App\Models\Project;
use Illuminate\Support\Facades\Log;
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
                'name' => $row["name"],
                'description' => $row["description"],
            ]);
        } catch (\Throwable $e) {
            Log::error($e);
            return null;
        }
    }
}
