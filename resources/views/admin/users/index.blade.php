@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 
@endsection 

@section('content')
        
        
        
        

        
<div class="card" style="width:77%">
            <h2 class="title2">Users</h2>
            
            <div class="row">
           

         <p> <a class="btn btn-sm btn-success float-right" href="{{ route('admin.users.create')}}"  role="button">Create User</a></p>
           </div>
        
            
                <table class="table" id="myTable">
            <thead>
                <tr>
                
                
                <th>check</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                <ul>
                @foreach($user->roles as $role)
                    <li>{{$role->name}}</li>
                @endforeach
                </ul>
                </td>
                
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id)}}"  role="button">Edit</a>
                    
                    <button type="button" class="btn btn-sm btn-danger" 
                    onclick="event.preventDefault();
                    document.getElementById('delete-user-form-{{$user->id}}').submit();">Delete</button>

                    <form id="delete-user-form-{{$user->id}}"  action="{{ route('admin.users.destroy', $user->id)}}"  method="POST" style="display:none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
                </tr>
                @endforeach
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