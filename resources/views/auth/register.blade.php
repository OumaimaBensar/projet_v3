@extends('template.main')

@section('content')

<div class="container" id="center">
        <h1 class="titre">Registration</h1>

        <form method="POST" action="{{route('register')}}">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input   type="text" name = "name" class="form-control  @error('name') is_invalid @enderror" id="name" aria-describedby="name"  value="{{ old('name')}}">
            @error('name')
                <span  class="invalid-feedback d-block"  role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input  type="email" name = "email" class="form-control  @error('email') is_invalid @enderror" id="email" 
            aria-describedby="email" value="{{ old('email')}}"  pattern="[a-zA-Z]+\.[a-zA-Z]+@amdl\.gov\.ma" >
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">password confirmation</label>
            <input name ="password_confirmation" type="password" class="form-control  @error('password_confirmation') is_invalid @enderror" id="psw_conf">
            @error('password_confirmation')
                <span  class="invalid-feedback d-block"  role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>



@endsection