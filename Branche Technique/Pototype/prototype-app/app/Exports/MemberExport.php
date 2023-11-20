<?php

namespace App\Exports;


use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MemberExport implements FromCollection, WithStyles, WithHeadings
{
    protected $memberData;
    public function __construct($memberData)
    {
        $this->memberData = $memberData;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->memberData->map(function ($members) {
            return [
                'firstName' => $members->firstName,
                'lastName' => $members->lastName,
                'email' => $members->email,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'first Name',
            'last Name',
            'email',
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
