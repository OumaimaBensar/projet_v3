<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class EmployeesImport implements ToModel, WithHeadingRow
{
    private $grades;

    public function __construct()
    {
        $this->grades = Grade::pluck('id', 'G_name', 'T_Journalier'	);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nom'=>$row['nom'],
            'prenom'=>$row['prenom'],
            'CIN'=>$row['cin'],
            'mail_prof'=>$row['email'],
            'num_tele'=>$row['tele'],
            'grade_id'=>$this->grades[$row['grade']],
            'v_perso'=>$row['voitureexist'],

        ]);
    }
}
