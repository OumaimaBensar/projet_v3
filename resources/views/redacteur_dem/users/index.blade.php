@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 

<style>

* {box-sizing: border-box;}



/* The popup form - hidden by default */
.form-popup {
    display: none;
    height: fit-content;
    position: absolute;
    bottom: -500px;
 /* if we get the height of the div containig the table and storing it into a variable
 then we can keep the value of the bottom responsive to it. */
    border: 2px solid #262020;
    z-index: 9;
    padding: 20px 40px 20px;
    border-radius: 20px;
    width:1200px;
    margin-left: -240px;
    margin-top: 200px;
    /* top: -150px; */
    left: 280px;
}

.div_style{
    height: fit-content;

    background-color: white;
    width: fit-content;
    padding: 10px;
    margin: 20px 0px 20px 0px;
    border-left: 3px solid blueviolet;
}


</style>

@endsection 

@section('content')
        
        
        
        

        
<div class="card" style="width:70%;  ">
            <h2 class="title2">Vos Demande</h2>
            
            <div class="row">
           

         <p> <a class="btn btn-sm btn-success float-right" href="{{ route('redacteur_dem.users.create')}}"  role="button">Create demande</a></p>
           </div>
        
            
                <table class="table" id="myTable">
            <thead>
                <tr>
                
                <th>check</th>
                <th scope="col">ID</th>
                <th>Responsable Mission</th>
                <th>Accompagnateur</th>
                <th>date depart</th>
                <th>date arrive</th>
                <th>destination</th>
                <th>Moyen</th>
                <th>Motif</th>
                <th>Validations</th>
                </tr>
            </thead>
            <tbody>
         <!-- =========================== -->
                @foreach($demandes as $demande)
                @if($demande->user_id==Auth::user()->id)
                <tr>
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                                        
                <th scope="row">{{$demande->id}}</th>
                
                <td>{{\app\Models\Employee::where(['id' => $demande->employee_id])->first()->nom;}}</td>
                <!-- responsable -->

               <td> 
                 <!-- accompagnateur!! -->
                <ul>
                    @foreach($demande->accompagnateurs as $accompagnateur)
                        <li>{{$accompagnateur->nom}}</li>
                    @endforeach
                </ul> 
                
                 </td>

                <td>{{$demande->date_depart}}</td>
                <td>{{$demande->date_arrive}}</td>

               
                <!--  destination  -->
               
                    
               <td>{{App\Models\Destination::where(['id' => $demande->destination_id])->first()->Ville;}}</td>

               
              
               

                <td>{{$demande->Moyen}}</td>
                <td>{{$demande->motif}}</td>


                <!-- =========================== -->




                <td>                    
                    <button type="button" class="btn btn-sm btn-primary open-button" style="margin-top: 50px;"
                    onclick="document.getElementById('create-validation-form-{{$demande->id}}').style.display = 'block';">
                    <div style='    border: 2px solid black;
                                    width: 27px;
                                    height: 27px;
                                    border-radius: 18px;
                                    margin: 4px 5px 5px 7px;
                                    background-color:#93c54b;
                                    color:black'>
                                    {{Illuminate\Support\Facades\DB::table('validations')
                                    ->where('demande_id', $demande->id)
                                    ->count();
                                    
                                   }}
                                  </div>
                     Show details</button>

                    <div class="form-popup" id="create-validation-form-{{$demande->id}}">
                   
                    <button type="button" class="close" style="float:right" onclick="
                        document.getElementById('create-validation-form-{{$demande->id}}').style.display ='none';" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>

                         <h4>Validation responce:</h4><br><br>
                         <table class="table1" id="myTable1" style='border:1px solid black' >
            <thead>
                <tr>
                <th>validator</th>
                <th>decision</th>
                <th>motif</th>
                <th>Edit</th>

                </tr>
            </thead>

            <tbody>
            
            <?php   

                    $results = Illuminate\Support\Facades\DB::table('validations')
                                                ->where('demande_id', $demande->id)
                                                ->get();
                                                
                                                ?>                       
        @foreach($results as $result)
            <tr>
            <td><b>{{Illuminate\Support\Facades\DB::table('employees')
                                    ->wherein('id',function($query) use($result)
                                    {$query->from('users')
                                    ->where('id',$result->user_id)
                                    ->select('employee_id');})
                                    ->pluck('nom');
                    
                            }}
                            {{Illuminate\Support\Facades\DB::table('employees')
                                    ->wherein('id',function($query) use($result)
                                    {$query->from('users')
                                    ->where('id',$result->user_id)
                                    ->select('employee_id');})
                                    ->pluck('prenom');
                    
                            }}
                            </b></td>
            <td><b>{{$result->Reponse}}</b></td>
            <td><b>{{$result->Motif_Validation}}</b></td>
            <td>
                @if($result->Reponse=='Edit Again')
                <a class="btn btn-sm btn-primary" href="{{ route('redacteur_dem.users.edit', $demande->id)}}"  role="button">Edit</a>

                @else
                <b style="margin-left: 10px;">X</b>
                @endif
            </td>
            </tr>
        @endforeach    

       

            
            </tbody>
            </table>

<br>
                            
                    </div>
                </td>




                <!-- =========================== -->

                </tr>
                @endif
                 @endforeach 
                <!-- =========================== -->


            </tbody>
            </table>
       </div>

     
        
    
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>            
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script >
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );

        

</script>
@endsection 