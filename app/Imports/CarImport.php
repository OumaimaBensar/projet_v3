<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\Marque;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CarImport implements ToModel, WithHeadingRow
{
    private $marques;

    public function __construct()
    {
        $this->marques = Marque::pluck('id', 'name_Marque');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Car([
            'matricule'=>$row['matricule'],
            'marque_id'=>$this->marques[$row['marque']],
            'assurance'=>Carbon::parse($row['assurance'])->format('Y-m-d H:i:s'),
            'date_aquisition'=>Carbon::parse($row['date_aquisition'])->format('Y-m-d H:i:s'),
            'derniere_visite_tech'=>Carbon::parse($row['derniere_visite_tech'])->format('Y-m-d H:i:s'),
            'fin_carte_grise'=>Carbon::parse($row['fin_carte_grise'])->format('Y-m-d H:i:s'),
            'etat_meca'=>$row['etat_meca'],
            'etat_disp'=>$row['etat_disp'],
            'Carburant'=>$row['carburant'],
            'kilometrage'=>$row['kilometrage'],
            'puissance'=>$row['puissance'],
            'consom_100'=>$row['consom_100'],
            'poid_vide'=>$row['poid_vide'],
            'nbre_place'=>$row['nbre_place'],
            'capacite_bagage'=>$row['capacite_bagage'],
            
            
        ]);
    }
}