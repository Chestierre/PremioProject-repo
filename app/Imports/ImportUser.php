<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            // 'username' => $row[0],
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'userrole' => $row['userrole'],
            // 'password' => bcrypt($row[1]),
            // 'userrole' => $row[2],
        ]);
    }
}
