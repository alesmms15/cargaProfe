<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Profesor;

class ProfesorImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Profesor([

            'rut_profesor' => $row['rut_profesor'],
            'nombre_profesor' => $row['nombre_profesor'],
            'correo' => $row['correo'],
            'password' => $row['password'],
            
        ]);

    }
}


