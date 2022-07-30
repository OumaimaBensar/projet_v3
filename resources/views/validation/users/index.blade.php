@extends('template.main')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 <style>

* {box-sizing: border-box;}



/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
    bottom: 200px;
    right: 630px;
    border: 3px solid #262020;
    z-index: 9;
    padding: 20px 40px 20px;
    background-color: #e6edef;
    border-radius:20px;
    width:400px;
}


</style>
@endsection 

@section('content')
        
        
        
        

        
<div class="card" style="width:77%">
            <h2 class="title2">Demandes</h2>
            
            <div class="row">
           

           </div>
        
            
                <table class="table" id="myTable">
            <thead>
                <tr>
                
                <th>check</th>
                <th scope="col">ID</th>
                <th>Responsable Mission</th>
                <th>Accompagnateur</th>
                <th>date depart</th>
                <th>date arrive</th>
                <th>destination</th>
                <th>Moyen</th>
                <th>Motif</th>
                <th>Actions</th>
                
                </tr>
            </thead>
            <tbody>
         <!-- =========================== -->
                @foreach($demandes as $demande)
                
                <tr>
                <th>
                <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                </div>
                </th>
                                        
                <th scope="row">{{$demande->id}}</th>
                
                <td>{{\app\Models\Employee::where(['id' => $demande->employee_id])->first()->nom;}}</td>
                <!-- responsable -->

               <td> 
                 <!-- accompagnateur!! -->
                <ul>
                    @foreach($demande->accompagnateurs as $accompagnateur)
                        <li>{{$accompagnateur->nom}}</li>
                    @endforeach
                </ul> 
                
                 </td>

                <td>{{$demande->date_depart}}</td>
                <td>{{$demande->date_arrive}}</td>

               
                <!--  destination  -->
               
                    
               <td>{{App\Models\Destination::where(['id' => $demande->destination_id])->first()->Ville;}}</td>

               
              
               

                <td>{{$demande->Moyen}}</td>
                <td>{{$demande->motif}}</td>

               
                <td>                    
                    <button type="button" class="btn btn-sm btn-primary open-button" 
                    onclick="openForm()">Traiter</button>

                    <div class="form-popup" id="myForm">
                    <form    action="{{ route('validation.users.store', $demande->id)}}"  method="POST">
                    
                    @csrf  
                    

                         <h4>Validation Form:</h4>

                            <div class="mb-3">
                            <div class="form-group">
                            <input type="hidden" class="form-control" name="demande" value="{{$demande->id}}" >  
                            <input type="hidden" class="form-control" name="redacteur" value=" {{Auth::user()->id;}}" >  
                            </div>
                            </div>
                            <div class="form-check">
                                
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

                        
                        <button type="submit" class="btn btn-primary btn cancel" onclick="closeForm()">Submit</button>
                       
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


        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }

        function disabletextarea(){
            document.getElementById("disable").disabled = true;
        }

        function enabletextarea(){
            document.getElementById("disable").disabled = false;
        }
        

</script>
@endsection 