@extends('template.main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
.divschange{
    margin:10px;
}


</style>



@endsection 

@section('content')
        

        
        

        
<div class="card" style="width:50%;  margin-left:20px; float:right;">
            <h2 class="title2">Affectation:</h2>
           
           
<br><br>
                <table class="table" id="myTable">
            <thead>
                <tr>
                
                <th>check</th>
                <th scope="col">ID Affectation</th>
                <th>Employee</th>
                <th>Driver</th>
                <th>Car</th>
                <th>Action</th>
                
               
                
                </tr>
            </thead>
            <tbody>
            @foreach($affectations as $affectation)
            <tr>
                <th>
                <div class="form-check">
                <input class=" copy form-check-input position-static" type="checkbox"  name='mycheckboxes[]' value=""  aria-label="...">
                </div>
                </th>

                <td scope="col">{{$affectation->id}}</td>
                <td>{{$affectation->employee->nom}}</td>
                @if($affectation->driver_id ==NULL)
                <td>NONE</td>
                @else
                <td>{{$affectation->driver->Nom}}</td>
                @endif

                @if($affectation->car_id ==NULL)
                <td>NONE</td>
                @else
                <td>{{$affectation->car->matricule}}</td>
                @endif

                <td>
                <button type="button" class="btn btn-sm btn-danger" 
                    onclick="event.preventDefault();
                    document.getElementById('delete-aff-form-{{$affectation->id}}').submit();">Delete</button>

                    <form id="delete-aff-form-{{$affectation->id}}"  action="{{ route('GestionMission.affectations.destroy', $affectation->id)}}"  method="POST" style="display:none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            
       </div>

    <!-- -------------------------------- -->

       <div style="width: 45%;
                    height: 400px;
                    margin: -3px 15px;
                    float: left;
                    background-color: gray;
                    padding: 20px;">

        <form action='{{route("GestionMission.affectations.store")}}' method='POST'>
            @csrf
<br>
            <h4 style='color:white'>Ajouter Affectation:</h4>
            <br>

            <input type="hidden" class="form-control" name="user_id" value=" {{Auth::user()->id;}}" >  


            <div class=" divschange mb-3" style='float:left'>
        <div class="form-group">
            <label for="exampleFormControlSelect1" style='color:white'>employee</label>
            <select class="form-control" name="employee_id" id="exampleFormControlSelect1" style='width:300px'>
            
            @foreach($employees as $employee)
            <option value="{{$employee->id}}">{{$employee->nom}}</option>
            @endforeach
           
            </select>
        </div>
        </div>


            <div class=" divschange mb-3" style='float:right  '>
        <div class="form-group">
            <label for="exampleFormControlSelect1" style='color:white'>Conducteur</label>
            <select class="form-control" name="driver_id" id="exampleFormControlSelect1" style='width:300px'>
            
            <option value="">NONE</option>

            @foreach($drivers as $driver)
            <option value="{{$driver->id}}">{{$driver->Nom}}</option>
            @endforeach
           
            </select>
        </div>
        </div>

        


        <div class=" divschange mb-3" style='float:right'>
        <div class="form-group">
            <label for="exampleFormControlSelect1" style='color:white'>Voiture de service</label>
            <select class="form-control" name="car_id" id="exampleFormControlSelect1" style='width:300px'>

            <option value="">NONE</option>

            @foreach($cars as $car)
            <option value="{{$car->id}}">{{$car->matricule}} [ {{$car->marque->name_Marque}} ]</option>
            @endforeach
           
            </select>
        </div>
        </div>

        <button type="submit" class="btn btn-primary" style='margin-top:140px;
                                                            margin-left: 940px;'>Submit</button>

        </form>
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