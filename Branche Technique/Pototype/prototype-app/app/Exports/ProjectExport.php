<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectExport implements FromCollection, WithStyles, WithHeadings
{
protected $projectData;
public function __construct($projectData)
{
    $this->projectData = $projectData;
}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->projectData->map(function ($projects) {
            return [
                'nom' => $projects->name,
                'description' => $projects->description,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'nom',
            'description',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
