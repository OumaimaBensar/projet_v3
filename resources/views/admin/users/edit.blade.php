@extends('template.main')

@section('content')

<div class="container" id="center">
        <h1 class="titre">Edit New User</h1>

        <form method="POST" action="{{route('admin.users.update', $users->id)}}">
        @method('PATCH')
        @include('admin.users.partie_integre.form')

        </form>

</div>



@endsection