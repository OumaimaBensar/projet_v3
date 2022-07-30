@extends('template.main')

@section('content')
     
<div class="container" id="center">
        <h1 class="titre">Demande de Mise à Disposition</h1>
<br><br>
        <form method="POST" action="{{route('redacteur_dem.users.store')}}">
        
        @csrf

<div class="mb-3">
<div class="form-group">
    <input type="hidden" class="form-control" name="redacteur" value=" {{Auth::user()->id;}}" >  
</div>
</div>

<div class="mb-3">
<div class="form-group">
    <label for="exampleFormControlSelect1">Responsable Mission</label>
    <select class="form-control" name="Resp" id="exampleFormControlSelect1">
     @foreach($emps as $emp)
      <option value="{{$emp->id}}">{{$emp->nom}} {{$emp->prenom}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="mb-3">
<div class="form-group">
    <label for="exampleFormControlSelect1">Destination</label>
    <select class="form-control"  name="destination"  id="exampleFormControlSelect1">
     @foreach($destinations as $destination)
      <option value="{{$destination->id}}">{{$destination->Ville}} </option>
      @endforeach
    </select>
  </div>
</div>

<div class="mb-3">
<div class="form-group">
     
<label for="start" class="form-label">Start date:</label>
<input class="form-control" type="date" id="start" name="trip-start"
       >

  </div>
</div>

<div class="mb-3">
<div class="form-group">

<label for="start" class="form-label">End of Mission date:</label>
<input class="form-control" type="date" id="start" name="trip-end">

  </div>
</div>

<div class="mb-3">
<div class="form-group">
     
<label for="select" class="form-label">Accampagnateurs</label>
<select class="select form-control"  name="Accampagnateurs[]" id="mltislct" multiple >
     @foreach($emps as $emp)
     <option value="{{$emp->id}}">{{$emp->nom}} {{$emp->prenom}}</option>
      @endforeach
  
</select>

  </div>
</div>


<div class="mb-3">
<div class="form-group">
<label for="select" class="form-label">Moyen</label>
<select class="select form-control"  name="moyen" >
<option value="voiture Personnelle">Voiture personnelle</option>
<option value="voiture de service">voiture de service</option>
<option value="train">Train</option>
<option value="avion">Avion</option>
</select>

  </div>
</div>



<div class="mb-3">
<div class="form-group">

<label for="motif" class="form-label">Motif</label>
<textarea class="form-control"  spellcheck="true" name="motif" required="required" rows="8" cols="5">
</textarea>
</div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>




@endsection
