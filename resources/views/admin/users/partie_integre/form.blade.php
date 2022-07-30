@csrf

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input   type="text" name ="name" class="form-control  @error('name') is_invalid @enderror" id="name" aria-describedby="name" 
    value="{{ old('name')}} @isset($users){{$users->name}} @endisset ">
    @error('name')
        <span  class="invalid-feedback d-block"  role="alert">
            {{$message}}
        </span>
    @enderror
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
@isset($create)
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input name ="password" type="password" class="form-control  @error('password') is_invalid @enderror" id="password" >
    @error('password')
        <span  class="invalid-feedback d-block"  role="alert">
            {{$message}}
        </span>
    @enderror
</div>
@endisset



<div  class="mb-3">

@foreach($roles as $role)
<div class="form-check">

        <input class="form-check-input" name="roles[]"  type="checkbox" value="{{$role->id}}" 
        id="{{$role->name}}" @isset($users) @if(in_array($role->id, $users->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-check-label" for="{{$role->name}}">
            {{$role->name}}
            </label>
         </div>

@endforeach

</div>


<button type="submit" class="btn btn-primary">Submit</button>