<?php

namespace Database\Seeders;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO employees (`id`, `nom`, `prenom`, `CIN`, `mail_prof`, `num_tele`, `grade_id`, `direction_id`, `departement_id`, `service_id`, `V_perso`, `created_at`, `updated_at`) VALUES
        (1, 'mohammed', 'yousfi', 'AE2344', 'amdl@amdl.gov.ma', '06234929391', 1, 5, 12, 25, 'Yes', NULL, NULL),
        (2, 'mbarek', 'kafsaoui', 'AE23432', 'mbarak.kafsaoui@amdl.gov.ma', '0647897439', 3, 4, 9, 25, 'Yes', '2022-08-17 11:18:00', '2022-08-17 11:18:00'),
        (3, 'nada', 'zniber', 'AE1143', 'nada.zniber@amdl.gov.ma', '0634003239', 4, 4, 9, 19, 'No', '2022-08-17 11:19:43', '2022-08-17 11:19:43'),
        (4, 'aissam', 'ech-chabbi', 'AE2341', 'aissam.echchabbi@amdl.gov.ma	\n', '0634743239', 2, 1, 12, 25, 'Yes', '2022-08-17 11:21:24', '2022-08-17 11:21:24'),
        (5, 'meriem', 'boucheour', 'AE10430', 'meriem.boucheour@amdl.gov.ma', '064997439', 3, 1, 1, 25, 'Yes', '2022-08-17 11:22:59', '2022-08-17 11:22:59'),
        (6, 'hamza', 'el barch', 'AE10431', 'hamza.elbarch@amdl.gov.ma', '0634798839', 4, 1, 1, 1, 'Yes', '2022-08-17 11:24:28', '2022-08-17 11:24:28'),
        (7, 'sara', 'samssem', 'AE23499', 'sara.samssem@amdl.gov.ma', '0647897779', 4, 1, 1, 2, 'No', '2022-08-17 11:25:39', '2022-08-17 11:25:39'),
        (8, 'amine', 'mrabet', 'AE1432', 'amine.mrabet@amdl.gov.ma', '0634000239', 5, 1, 1, 1, 'No', '2022-08-17 11:35:31', '2022-08-17 11:35:31')");
        
            }
}
