<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
</head>
<body>
    <h1 style='align:center'>ORDRE DE MISSION</h1>

    <img src="C:\Users\allo\Downloads\amdl_img" alt="rien">

    <br><br>
                <p>Responsable Mission:
               {{App\Models\Employee::where(['id' => $deps['employee_id']])->first()->nom;}} 
               {{App\Models\Employee::where(['id' => $deps['employee_id']])->first()->prenom;}}
               </p>

               <p> Accompagnateur(s): 
                <li>
               {{
                   Illuminate\Support\Facades\DB::table('employees')
                     ->wherein('id', function($query) use ($deps) {
                         $query->from('demande_employee')
                               ->where('demande_id', $deps->id)
                               ->select('employee_id');

                     })->pluck('nom');
                                            }}</li>
                                            </p>

               <p>Date de depart: {{$deps->date_depart}}</p>
               <p>Date d'arrive: {{$deps->date_arrive}}</p>
               <p>Destination: {{App\Models\Destination::where(['id' => $deps['destination_id']])->first()->Ville;}}</p>
               <p>Moyen: {{$deps->Moyen}}</p>
               @if($deps->Moyen == 'voiture de service')
               <p>{{App\Models\Car::where(['id' => $deps['car_id']])->first()->matricpe;}}</p>
               @endif
               <p>Conducteur: {{App\Models\Driver::where(['id' => $deps['driver_id']])->first()->Nom;}}</p>
               <p>Motif: {{$deps->motif}}</p>
               
</body>
</html>