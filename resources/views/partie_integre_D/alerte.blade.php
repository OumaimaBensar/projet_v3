@if(session('success'))
    <div class="alert alert-primary" role="alert" 
    style="width:400px;
            margin-left:18%;
            text-align:center;
            font-weight: bold;">
   {{session('success')}}
    </div>

@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert" 
    style="width:400px;
            margin-left:18%;
            text-align:center;
            font-weight: bold;">
   {{session('error')}}
    </div>

@endif