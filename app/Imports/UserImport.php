<?php

namespace App\Imports;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue; //IMPORT SHOUDLQUEUE
use Maatwebsite\Excel\Concerns\WithChunkReading; //IMPORT CHUNK READING

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            $data = new User ([
                'nik' => $row[4],
                'password' => Hash::make($row['3']),
                'name' => $row['5'],
                'email' => $row['6'],
                'role_id' => '2'                
            ]);
            $data = new Profile ([
                'register_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['1']),
                'nik' => $row[4],
                'kk_id' => $row['2'],
                'name' => $row['5'],
                'birth_place' => $row['7'],
                'birth_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['8']),
                'blood_type' => $row['9'],
                'address' => $row['10'],
                'religion' => $row['11'],
                'marriage' => $row['12'],
                'job' => $row['13'],
                'gender' => $row['14'],
                'rt' => $row['15'],
                'rw' => $row['16'],
                'education' => $row['17'],
                'citizenship' => $row['18'],
                'lineage' => $row['19'],
                'father_name' => $row['20'],
                'mother_name' => $row['21'],
                'photo_path' => $row['22'],
                'status' => $row['23'],
            ]);

        // dd($data);
        return $data;
    }
    // public function chunkSize(): int
    // {
    //     return 1000; //ANGKA TERSEBUT PERTANDA JUMLAH BARIS YANG AKAN DIEKSEKUSI
    // }
}
