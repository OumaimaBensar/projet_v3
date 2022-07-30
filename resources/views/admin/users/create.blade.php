@extends('template.main')

@section('content')

<div class="container" id="center">
        <h1 class="titre">Create New User</h1>

        <form method="POST" action="{{route('admin.users.store')}}">
        
        @include('admin.users.partie_integre.form', ['create'=>true])
    </form>

</div>



@endsection