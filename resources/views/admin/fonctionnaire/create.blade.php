@extends('template.main')

@section('content')

<div class="container" id="center">
        <h1 class="titre">Create New Employee</h1>

        <form method="POST" action="{{route('admin.fonctionnaire.store')}}">
            @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input   type="text" name ="name" class="form-control " id="name" aria-describedby="name" >
        </div>
       
        <div class="mb-3">
        <label for="name" class="form-label">Familly Name</label>
        <input   type="text" name ="f_name" class="form-control  " id="f_name" aria-describedby="Familly name" >
        </div>
        
        <div class="mb-3">
        <label for="cin" class="form-label">CIN</label>
        <input  type="text"  name = "cin" class="form-control  " id="cin" aria-describedby="CIN"> 
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input  type="email"  name = "email" class="form-control  @error('email') is_invalid @enderror" id="email" aria-describedby="email"
        value="{{ old('email')}} @isset($users){{$users->email}} @endisset " >
        @error('email')
            <span  class="invalid-feedback d-block"  role="alert">
                {{$message}}
            </span>
        @enderror
        </div>
        
        <div class="mb-3">
        <label for="tele" class="form-label">tele</label>
        <input  type="tel"  name = "tele" class="form-control  " id="tele" aria-describedby="tele"> 
        </div>

        <div class="mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Grade</label>
            <select class="form-control" name="grade" id="exampleFormControlSelect1">
            @foreach($grades as $grade)
            <option value="{{$grade->id}}">{{$grade->G_name}}</option>
            @endforeach
            </select>
        </div>
        </div>

        <div class="mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Appartient à la direction</label>
            <select class="form-control" name="Dir" id="exampleFormControlSelect1">
            @foreach($dirs as $dir)
            <option value="{{$dir->id}}">{{$dir->Dir_name}}</option>
            @endforeach
            </select>
        </div>
        </div>

        <div class="mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Appartient au departement</label>
            <select class="form-control" name="dep" id="exampleFormControlSelect1">
            @foreach($deps as $dep)
            <option value="{{$dep->id}}">{{$dep->Dep_name}}</option>
            @endforeach
            </select>
        </div>
        </div>
        
        <div class="mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Appartient au service</label>
            <select class="form-control" name="service" id="exampleFormControlSelect1">
            @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->S_name}}</option>
            @endforeach
            </select>
        </div>
        </div>

        <div class="mb-3">
        
        <label for="">He/she has a personel Car:</label>
        <div class="form-check">          
        <input type="radio" id="exist" name="exist_car" value="yes">
        <label for="yes">Yes</label><br>
        <input type="radio" id="dont_exist" name="exist_car" value="no" >
        <label for="no">No</label><br>
        </div>        
        </div>
        


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>



@endsection