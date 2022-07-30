<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Driver;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DriverImport implements ToModel, WithHeadingRow
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Driver([
            'Nom'=>$row['nom'],
            'Prenom'=>$row['prenom'],
            'CIN'=>$row['cin'],
            'Email'=>$row['email'],
            'Num_tel'=>$row['num_tel'],
            'Numero_PC'=>$row['numero_pc'],
            'Expiration_PC'=>Carbon::parse($row['expiration_pc'])->format('Y-m-d H:i:s'),
            'Nbre_deplacement'=>$row['nbre_deplacement'],
            
        ]);
    }
}