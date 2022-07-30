@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 
@endsection 

@section('content')
        
        
        
        

        
<div class="card" style="width:77%">
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