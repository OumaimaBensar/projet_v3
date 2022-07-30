@extends('template.main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css">
 <style>
        th, td { white-space: nowrap; }
        div.dataTables_wrapper {
        width: 1200px;
        margin: 0 auto;
    }
 </style>
@endsection 


@section('content')
<!-- ================= -->




<!-- ================= -->
<div class="card" style="width:80%">
<h2 class="title2">Car_Data:</h2><br>


 <div class="container mt-5" > 
 @can('is-admin') 

 <p> <a class="btn btn-sm btn-success float-right" href="#"  role="button">Create Car</a></p>
<br>
        <form action="{{route('admin.car.store')}}"  method="POST"  enctype="multipart/form-data">
               @csrf
                <input type="file" name="import_file_car" accept=".xlsx, .xls, .csv"  required>
                <input type="submit" value="Upload">
        </form>


        <br><br>  
@endcan  

<table id="myTable" class="table table-striped table-bordered stripe row-border order-column" style=" width: 100%; padding:20px">
        <thead>
            <tr>
                <td>check</td>
                <th scope="row">matricule</th>
                <td>name_Marque</td>
                <td>assurance</td>
                <td>derniere_visite_tech</td>
                <td>fin_carte_grise</td>
                <td>etat_meca</td>
                <td>etat_disp</td>
                <td>Carburant</td>
                <td>kilometrage</td>
                <td>puissance</td>	
                <td>consom_100</td>	
                <td>poid_vide</td>	
                <td>nbre_place</td>	
                <td>capacite_bagage</td>	
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>


        @foreach($cars as $car)
                <tr>
                
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                <th scope="row">{{$car->matricule}}</th>
                <td>{{$car->marque->name_Marque}}</td>
                <td>{{$car->assurance}}</td>
                <td>{{$car->derniere_visite_tech}}</td>
                <td>{{$car->fin_carte_grise}}</td>
                <td>{{$car->etat_meca}}</td>
                <td>{{$car->etat_disp}}</td>
                <td>{{$car->Carburant}}</td>
                <td>{{$car->kilometrage}}</td>
                <td>{{$car->puissance}}</td>	
                <td>{{$car->consom_100}}</td>	
                <td>{{$car->poid_vide}}</td>	
                <td>{{$car->nbre_place}}</td>	
                <td>{{$car->capacite_bagage}}</td>	
                <td>
                    <a class="btn btn-sm btn-primary" href="#"  role="button">Edit</a>
                    
                    
                </td>

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
<script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
<script >
        $(document).ready( function () {
        var table = $('#myTable').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            left: 2
        }
        
    } )});


       
   
</script>   
@endsection 