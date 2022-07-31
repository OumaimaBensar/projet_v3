<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name = "csrf-token" content="{{csrf_token()}}">

        <title>{{config('app.name', 'User Management System')}}</title>

       
        <!-- Styles -->
        <link href = "{{asset('css/app.css')}}"  rel = "stylesheet">
       
         <!-- Js -->
        <script  src = "{{ asset('js/app.js')}}" defer></script>
        @yield('styles')
  </head>

    <body >

<nav class="navbar navbar-expand-lg ">
    
        <div class="container-fluid">
            <span class="navbar-brand" href="#" style="color:white">AMDL Plate-forme</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <div>
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <h7 style="color:white;">Wellcome {{Auth::user()->name;}}</h7>
                                <!-- <a href="{{ url('/home') }}">Home</a> -->
                                <a style="color:white; 
                                position: absolute;
                                right: 12px; "
                                  href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">logout</a>
                                <form  id="logout_form" action="{{route('logout')}}" method="POST" style="display:none" >
                                @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}">Log in</a> 

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    
</nav>

<!-- ===================== -->
@can('logged_in')
<nav class="navbar sub_nav navbar-expand-lg ">
    
    <div class="container-fluid">
            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">DashBoard</a>
                </li>
                @can('is-admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users.index')}}">User Access</a>
                </li>

               
               
               
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.fonctionnaire.index')}}">Employee</a>

               
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.car.index')}}">Car</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.driver.index')}}">Driver</a>
            </li>
            @endcan 
            @can('is-redacteur')   
            <li class="nav-item">
                <a class="nav-link" href="{{route('redacteur_dem.users.index')}}">Espace_Demande</a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{route('validation.users.index')}}">Validation_Space</a>
            </li> 
                
            </ul>
        </div>

    </div>
    
</nav>
@endcan

        
                
        <main>
            @include('partie_integre_D.alerte')
            @yield ('content')
           
        </main>
        
        @yield ('javascript')    

    </body>
</html>
