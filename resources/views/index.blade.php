@extends('template.main')

@section('styles')

<style>
    .bg-image {
  /* The image used */
  background-image: url("main.png");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
</style>
@endsection

@section('content')


<div class="bg-image" ></div>

<div class="bg-text">
  <h2>Amdl plate_forme</h2>
  <h1 style="font-size:30px">INEGRATEUR DES DYNAMIQUE LOGISTIQUE</h1>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.<br> Magnam itaque fugiat facere pariatur deleniti in placeat praesentium cupiditate aliquam possimus atque<br> cum aperiam ipsam quas, ratione nam ab amet reiciendis!</p>
</div>


@endsection