@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 <style>

* {box-sizing: border-box;}



/* The popup form - hidden by default */
.form-popup {
    display: none;
    position: absolute;
    bottom: 71px;
    
    border: 2px solid #262020;
    z-index: 9;
    padding: 20px 40px 20px;
    
    border-radius: 20px;
    width: 700px;
    height:fit-content;
    left: 540px;
    top: -150px;
    margin-bottom:30px;
}

.div_style{
    background-color: white;
    width: fit-content;
    padding: 10px;
    margin: 20px 0px 20px 0px;
    border-left: 3px solid blueviolet;
}


</style>
@endsection 

@section('content')
        
        
<div class="card" style="width:27%">
            <h2 class="title2">Demandes</h2>
            
            <div class="row">
           

           </div>
        
            
                <table class="table" id="myTable">
            <thead>
                <tr>
                <th></th>
                <th scope="col">Mission</th>
                <th>Actions</th>
                
                </tr>
            </thead>
            <tbody>      
        
            @foreach($demandes as $demande)
                
                <tr>
                <th>
                <div class="form-check">
                <input class="form-check-input position-static"  type="checkbox" id="blankCheckbox" value="option1" aria-label="..." style="margin-top: 50px;">
                </div>
                </th>
                                        
                <th scope="row">
                          <div style = "background-color: #d4ebf7;
                                        padding: 10px;
                                        border-radius: 30px;
                                        text-align: center;
                                        font-size: 12px;
                                    "> 
                    <p>Edited by {{\app\Models\User::where(['id' => $demande->user_id])->first()->name;}}</p>
                    <p>Directed by {{Illuminate\Support\Facades\DB::table('employees')->where('id' , $demande->employee_id)->pluck('nom');}}  
                    {{Illuminate\Support\Facades\DB::table('employees')->where('id' , $demande->employee_id)->pluck('prenom');}} 
                    </p>
                    <p>Destination : {{App\Models\Destination::where(['id' => $demande->destination_id])->first()->Ville;}}</p> 
                    </div>
                </th>
                <td>                    
                    <button type="button" class="btn btn-sm btn-primary open-button" style="margin-top: 50px;"
                    onclick="document.getElementById('create-validation-form-{{$demande->id}}').style.display = 'block';">Traiter</button>

                    <div class="form-popup" id="create-validation-form-{{$demande->id}}">
                   
                    <button type="button" class="close" style="float:right" onclick="
                        document.getElementById('create-validation-form-{{$demande->id}}').style.display ='none';" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>

                         <h4>Validation Form:</h4>
<br>
                            <div>
                                <h4>Mission Info:</h4>

                               
                               <div class="div_style" style="float:left;"><b>Responsable Mission :</b>
                               {{Illuminate\Support\Facades\DB::table('employees')->where('id' , $demande->employee_id)->pluck('nom');}}

                               </div>
                               <div class="div_style" style="margin-left: 300px;"> <b>Accompagnateur :</b>
                                        
                                        <li>{{
                                           Illuminate\Support\Facades\DB::table('employees')
                                                                        ->wherein('id', function($query) use ($demande) {
                                                                            $query->from('demande_employee')
                                                                                  ->where('demande_id', $demande->id)
                                                                                  ->select('employee_id');

                                                                        })->pluck('nom');
                                            }}</li>
                                        
                               </div>
                               <div class="div_style"style="margin-right: 90px;
                                                            float: right;">
                               <li> <b>date depart :</b>
                                
                                     {{$demande->date_depart}}</li>

                                     <li>   <b> date arrive :</b>
                                     {{$demande->date_arrive}}</li>
                                     
                                     

                               </div>

                               


                               <div class="div_style"> <b>destination :</b>
                                
                              {{App\Models\Destination::where(['id' => $demande->destination_id])->first()->Ville;}}

                               </div>
                               <div class="div_style"> <b>Moyen :</b>
                              {{$demande->Moyen}}
               
                               </div>
                               <div class="div_style"> <b>Motif :</b>
                               {{$demande->motif}}
                               </div>
                                
                            </div>
                           <div>
                            <form     action="{{ route('validation.users.store', $demande->id)}}"  method="POST">
                    
                             @csrf  
                             
                            <div class="mb-3">
                            <div class="form-group">
                            <input type="hidden" class="form-control" name="demande" value="{{$demande->id}}" >  
                            <input type="hidden" class="form-control" name="redacteur" value=" {{Auth::user()->id;}}" >  
                            </div>
                            </div>
                            <div class="form-check">
                            <h6> Your decision:</h6>
                            <input type="radio" id="Accorder" name="decision" value="Accorder" onclick="disabletextarea()">
                            <label for="Accorder">Accorder</label><br>
                            <input type="radio" id="Rejeter" name="decision" value="Rejeter definitivement" onclick="enabletextarea()">
                            <label for="Rejeter">Rejeter definitivement</label><br>
                            <input type="radio" id="Edit" name="decision" value="Edit Again" onclick="enabletextarea()">
                            <label for="Edit">Edit Again</label>                              
                            </div>
                           
                        <div class="mb-3">
                        <div class="form-group">

                        <label for="motif" class="form-label">Motif</label>
                        <textarea class="form-control" id="disable" spellcheck="true" name="motif" required="required" rows="8" cols="5">
                        </textarea>
                        </div>
                        </div>

                        
                        <button type="submit" class="btn btn-primary btn cancel" onclick="
                                document.getElementById('create-validation-form-{{$demande->id}}').style.display = 'none';">Submit</button>
                        
                        <button type="button" class=" btn btn-danger btn cancel" onclick="
                        document.getElementById('create-validation-form-{{$demande->id}}').style.display ='none';">Close</button>

                        
                                
                       
                    </form>
                    </div>
                </td>
                </tr>                           
                @endforeach 
                <!-- =========================== -->


            </tbody>
            </table>
       </div>

        
    
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>            
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script >
        $(document).ready( function () {
        $('#myTable').DataTable();

        } );


        /* function openForm() {
            document.getElementById("myForm").style.display = "block";
        }*/

        /* function closeForm() {
        document.getElementById("myForm").style.display = "none";
        } */

        function disabletextarea(){
            document.getElementById("disable").disabled = true;
        }

        function enabletextarea(){
            document.getElementById("disable").disabled = false;
        }
        

</script>
@endsection 