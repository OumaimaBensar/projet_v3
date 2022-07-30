@extends('template.main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection 


@section('content')
<!-- ================= -->




<!-- ================= -->
 <div class="card" style="width:80%">
<h2 class="title2">Driver Data:</h2><br>

 <div class="container mt-5"> 
 @can('is-admin') 

 <p> <a class="btn btn-sm btn-success float-right" href="#"  role="button">Create Driver</a></p>
<br>
        <form action="{{route('admin.driver.store')}}"  method="POST"  enctype="multipart/form-data">
               @csrf
                <input type="file" name="import_file_Driver" accept=".xlsx, .xls, .csv"  required>
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
                <th>Email</th>
                <th>Num_tel</th>
                <th>Expiration du Permit de Conduite</th>
                <th>Numero permit de conduite</th>
                <th>Nombre de deplacement</th>
                <th scope="col">Action</th>
                

            </tr>
        </thead>
        <tbody>
                @foreach($drivers as $driver)
                <tr>
                
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                <th scope="row">{{$driver->Nom}}</th>
                <td>{{$driver->Prenom}}</td>
                <td>{{$driver->CIN}}</td>
                <td>{{$driver->Email}}</td>
                <td>{{$driver->Num_tel}}</td>
                <td>{{$driver->Expiration_PC}}</td>
                <td>{{$driver->Numero_PC}}</td>
                <td>{{$driver->Nbre_deplacement}}</td>
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