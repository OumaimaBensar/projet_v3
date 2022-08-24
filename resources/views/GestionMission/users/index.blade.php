@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
.style_th{
    border: 1px solid #ddd;
  padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

</style>



@endsection 

@section('content')
        

        
        

        
<div class="card" style="width:50%;  margin-left:20px; float:left;">
            <h2 class="title2">Vos Demande</h2>
            
            <div class="row">
           
            <span> <a  class="btn btn-sm btn-primary float-right" href='{{route("GestionMission.affectations.index")}}'  >Affectation</a></span>

           </div>
        
           
<br><br>
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
                
                </tr>
            </thead>
            <tbody>
         <!-- =========================== -->
                @foreach($demandes as $demande)
                <tr>
                <th>
                <div class="form-check">
                <input class=" copy form-check-input position-static" type="checkbox"  name='mycheckboxes[]' value="{{$demande->id}}"  aria-label="...">
                </div>
                </th>
                      
                <th scope="row">{{$demande->id}}</th>
                
                <td>{{\App\Models\Employee::where(['id' => $demande->employee_id])->first()->nom;}}</td>
                <!-- responsable -->

               <td> 
                 <!-- accompagnateur!! -->
                <ul>
                <li>{{
                        Illuminate\Support\Facades\DB::table('employees')
                        ->wherein('id', function($query) use ($demande) {
                        $query->from('demande_employee')
                        ->where('demande_id', $demande->id)
                        ->select('employee_id');
                        })->pluck('nom');
                    }}</li>
                </ul> 
                
                 </td>

                <td>{{$demande->date_depart}}</td>
                <td>{{$demande->date_arrive}}</td>

               
                <!--  destination  -->
               
                    
               <td>{{App\Models\Destination::where(['id' => $demande->destination_id])->first()->Ville;}}</td>

               
              
               

                <td>{{$demande->Moyen}}</td>
                <td>{{$demande->motif}}</td>


                <!-- =========================== -->


                <!-- =========================== -->

                </tr>
                 @endforeach 
                <!-- =========================== -->


            </tbody>
            </table>
            
       </div>

   
        

<!--id="blankCheckbox"-->
<div class="card" style="width:45%;  margin: -40px 30px; height:850px; float:right; background-color:#bab3b3">
<h4 style='color:white'>Creer deplacement:</h4>
<form method="POST" action="{{route('GestionMission.users.store')}}">
        
        @csrf

        <input type="hidden" class="form-control" name="user_id" value=" {{Auth::user()->id;}}" >  


        <div class="row"style='width:100%' >
        <table class="table1" id="myTable1" style='border:solid 2px white; background-color:white '>
            <thead>
                <tr>
                
                <th class='style_th' >checked </th>
                <th class='style_th'  scope="col">ID</th>
                <th class='style_th' >Responsable Mission</th>
                <th class='style_th' >Accompagnateur</th>
                <th class='style_th' >date depart</th>
                <th class='style_th' >date arrive</th>
                <th class='style_th' >destination</th>
                <th class='style_th' >Moyen</th>
                <th class='style_th' >Motif</th>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
        </div>




<div class="mb-3" style='position: absolute; width:75%;
                    bottom: 200px; right:30px; left:100px; ' >
        
        <div class="mb-3" style='float:left'>
        <div class="form-group">
            <label for="exampleFormControlSelect1" style='color:white'>Conducteur</label>
            <select class="form-control" name="driver_id" id="exampleFormControlSelect1" style='width:300px'>

            @foreach($conducteurs as $conducteur)
            <option value="{{$conducteur->id}}">{{$conducteur->Nom}}   {{$conducteur->Prenom}} </option>
            @endforeach
           
            </select>
        </div>
        </div>


        <div class="mb-3" style='float:right'>
        <div class="form-group">
            <label for="exampleFormControlSelect1" style='color:white'>Voiture de service</label>
            <select class="form-control" name="car_id" id="exampleFormControlSelect1" style='width:300px'>

            @foreach($voitures as $voiture)
            <option value="{{$voiture->id}}">{{$voiture->matricule}} </option>
            @endforeach  

            </select>
        </div>
        </div>
</div>
        <button  class="btn btn-danger" onclick='event.preventDefault(); $(function(){
            
                                        $("#myTable1 tbody").empty();
                                         $("#myTable .copy").attr("checked", false);
                                         $("#myTable .copy").attr("disabled", false);
                                         
                                        
                                        })' style='position: absolute;
                                                    bottom: 30px; left:30px'>clear table</button>

        <button type="submit" class="btn btn-primary" style='position: absolute;
                    bottom: 30px; right:30px' >Submit</button>

       

</form>

</div>


<div class="card" style="width:55%;  margin:100px 90px; height:fit-content; float:right; background-color:#bab3b3">
<h4 style='color:white'>Les deplacements que vous avez creer aujourd'hui :</h4>
        
        


        <div class="row"style='width:100%' >
        <table class="table1" id="myTable2" style='border:solid 2px white; background-color:white'>
            <thead>
                <tr>
                
                
                <th class='style_th' scope="col">ID dep</th>
                <th class='style_th'>Responsable Mission</th>
                <th class='style_th'>Accompagnateur</th>
                <th class='style_th'>date depart</th>
                <th class='style_th'>date arrive</th>
                <th class='style_th'>destination</th>
                <th class='style_th'>Moyen</th>
                <th class='style_th'>Voiture</th>
                <th class='style_th'>Conducteur</th>
                <th class='style_th'>Motif</th>
                <th class='style_th'>Action</th>
                
                
                
                </tr>
            </thead>
            <tbody>
            @foreach($deps as $dep)
                <tr>
               <td>{{$dep->deplacement_id}}</td>
               <td>{{App\Models\Employee::where(['id' => $dep['employee_id']])->first()->nom;}}
               {{App\Models\Employee::where(['id' => $dep['employee_id']])->first()->prenom;}}
               </td>

               <td>
               {{
                   Illuminate\Support\Facades\DB::table('employees')
                     ->wherein('id', function($query) use ($dep) {
                         $query->from('demande_employee')
                               ->where('demande_id', $dep->id)
                               ->select('employee_id');

                     })->pluck('nom');
                                            }}
               </td>

               <td>{{$dep->date_depart}}</td>
               <td>{{$dep->date_arrive}}</td>
               <td>{{App\Models\Destination::where(['id' => $dep['destination_id']])->first()->Ville;}}</td>
               <td>{{$dep->Moyen}}</td>
               <td>{{App\Models\Car::where(['id' => $dep['car_id']])->first()->matricule;}}</td>
               <td>{{App\Models\Driver::where(['id' => $dep['driver_id']])->first()->Nom;}}</td>
               <td>{{$dep->motif}}</td>

               <td><a  class="btn btn-sm btn-primary float-right" href='#' style="width:120px" >Aviser </a> 
               <br>
               <button  class="btn btn-sm btn-danger float-right" href='#'   >Ordre de Mission </button></td>
              

               <td></td>
                </tr>

                
            @endforeach   
            </tbody>
        </table>
        </div>


</div>
     
        
    
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>            
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script >
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );

        
    
        

         $(function() {$(document).on('click', 'input.copy', function(){
            
            if($(this).is(":checked")) {
                
                var $tr = $(this).parents('tr:first').clone();
                
                console.log($tr);
                $tr.appendTo($('#myTable1 > tbody'));
                
                $(this).attr('disabled', true); 

                       
/*              $('input:nth-child(1), td:nth-child(1), th:nth-child(1)', '#myTable1 tr').attr('disabled', true);
 */ 
                
                
               
    }});
   

});








</script>
@endsection 