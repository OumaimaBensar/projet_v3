@extends('template.main')

@section('content')

<div class="container" id="center">
        <h1 class="titre">Login</h1>

        <form method="POST" action="{{route('login')}}">

        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input  type="email" name = "email" class="form-control  @error('email') is_invalid @enderror" id="email" aria-describedby="email" value="{{ old('email')}}">
            @error('email')
                <span  class="invalid-feedback d-block"  role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name ="password" type="password" class="form-control  @error('password') is_invalid @enderror" id="password">
            @error('password')
                <span  class="invalid-feedback d-block"  role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">login</button>
    </form>

</div>



@endsection