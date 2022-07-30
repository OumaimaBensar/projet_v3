 @extends('template.main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 
@endsection 


@section('content')
<!-- ================= -->




<!-- ================= -->
<div class="card" style="width:77%">
<h2 class="title2">Fonctionnaire:</h2><br>
@can('is-admin')
<button type="button"  class="btn btn-dark" style="width:300px">Edit Grade/Taux_Journalier</button>

<br>
@endcan

 <div class="container mt-5"> 
 @can('is-admin') 

 <p> <a class="btn btn-sm btn-success float-right" href="#"  role="button">Create Employee</a></p>
<br>

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
<script >
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
</script>
@endsection 