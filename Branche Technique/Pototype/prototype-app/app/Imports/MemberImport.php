<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class MemberImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            return new Member([
                'first Name'     => $row[0],
                'last Name'    => $row[1], 
                'email'    => $row[1], 
            ]);
        } catch (\Throwable $e) {
            Log::error($e);
            return null;
        }
    }
}
