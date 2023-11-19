<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'first Name'     => $row[0],
            'last Name'    => $row[1], 
            'email'    => $row[1], 
            // 'password' => Hash::make($row[2]),
        ]);
    }
}
