<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User ([
            'nik' => $row['1'],
            'password' => Hash::make($row['2']),
            'name' => $row['3'],
            'email' => $row['4'],
            'role_id' => '2'
        ]);
        // dd($row);
        
    }
}
