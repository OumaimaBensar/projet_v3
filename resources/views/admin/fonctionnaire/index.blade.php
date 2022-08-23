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
<div class="card" style="width:77%">
<h2 class="title2">Fonctionnaire:</h2><br>


 <div class="container mt-5"> 
 @can('is-admin') 
 
<button type="button"  class="btn btn-dark" style="width:300px; margin:20px">Edit Grade/Taux_Journalier</button>



 <span> <a class="btn btn-sm btn-success float-right" href="{{route('admin.fonctionnaire.create')}}"  role="button">Create Employee</a></span>
<br><br>

        <form action="{{route('admin.fonctionnaire.store')}}"  method="POST"  enctype="multipart/form-data">
               @csrf
                <input type="file" name="import_file" accept=".xlsx, .xls, .csv"  required>
                <input type="submit" value="Upload">
        </form>


        <br><br>  
        @endcan       
<table id="myTable" class="table table-striped table-bordered" style="width:100%; padding:20px">
        <thead>
            <tr>
                <td>check</td>
                <th>Nom</th>
                <th>Prenom</th>
                <th>CIN</th>
                <th>Email prof</th>
                <th>Num_tel</th>
                <th>grade</th>
                <th>Direction</th>
                <th>departement</th>
                <th>Service</th>
                <th>Taux_Journalier</th>
                <th>Voiture personnelle</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            
                @foreach($emps as $emp)
                <tr>
                
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                <th scope="row">{{$emp->nom}}</th>
                <td>{{$emp->prenom}}</td>
                <td>{{$emp->CIN}}</td>
                <td>{{$emp->mail_prof}}</td>
                <td>{{$emp->num_tele}}</td>
                <td>{{$emp->grade->G_name}}</td>
                
                <td>{{App\Models\Direction::where(['id' => $emp['direction_id']])->first()->Dir_name;}}</td>
                <td>{{App\Models\Departement::where(['id' => $emp['departement_id']])->first()->Dep_name;}}</td>
                <td>{{App\Models\Service::where(['id' => $emp['service_id']])->first()->S_name;}}</td>

                <td>{{$emp->grade->T_Journalier}}</td>
                <td>{{$emp->V_perso}}</td>
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