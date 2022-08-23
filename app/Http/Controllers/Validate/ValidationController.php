<?php


namespace App\Http\Controllers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\Validation;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;



class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('is-validator')){

        
         $validators = DB::select('SELECT * from employees where id in
         (select employee_id from users where id in (select user_id from role_user where role_id = 
         (select id from roles where name = "validation" )) )')  ;

        
                
        $redacteurs = DB::select('SELECT * from employees where id in
        (select employee_id from users where id in (select user_id from role_user where role_id = 
        (select id from roles where name = "saisi" )) )')  ;
 
        $emps_sub = get_sub_emp();



        foreach($validators as $v)
            {
                $new_objVal_array = (array) $v;
                foreach($emps_sub as $e_sub)

                {
                    $new_objemp_array = (array) $e_sub;
                    if($new_objVal_array['id'] == $new_objemp_array['id'])
                    {
                        $A_emp_val[] =  $new_objemp_array['id'];
                     
                    }
                }
            }

      /* dd($A_emp_val); */

           

   function red_sub_emp() 
   {

    $redacteurs = DB::select('SELECT * from employees where id in
    (select employee_id from users where id in (select user_id from role_user where role_id = 
    (select id from roles where name = "saisi" )) )');
   
    $emps_sub = get_sub_emp();


     foreach($redacteurs as $r)
    {
        $new_objRed_array = (array) $r;
        foreach($emps_sub as $e_sub)

        {
            $new_objemp_array = (array) $e_sub;
            if($new_objRed_array['id'] == $new_objemp_array['id'])
            {
                $A_emp_red[] =  $new_objemp_array['id'];
            }
        }
    }
    return  $A_emp_red;
}




    if(empty($A_emp_val))
            {
          //[0=>{},1=>{},2=>{}]
         /*  $e = [21,22,23,24];
          $users = User::whereIn('id', $e)->get();
          dd($users);
           
          foreach($A_emp_red as $AER) 
        {
            $demandes = collect([]);
            $demandes = DB::select('SELECT * from demandes where id not in (select demande_id from validations) 
            and user_id in (select id from users where employee_id = ?) ', [$AER]);

        }   
        dd($demandes);     
               */
           /*  $demandes = DB::select("SELECT * from demandes where id not in (select demande_id from validations) 
            and user_id in (select id from users where employee_id in ('2','1'))");
            dd($demandes); */
            $demandes = DB::table('demandes')->whereNotIn('id',function ($query) {
                                                $query->from("validations")
                                                      ->select("demande_id");
                                        })->wherein('user_id', function ($query) {
                                            $query->from("users")
                                                  ->wherein('employee_id',red_sub_emp())
                                                  ->select("id");
                                        })
                                        
                                        ->get();
                                    
            }

    else{
        /*  $demandes = DB::select('SELECT * FROM demandes where id in 
        (select demande_id from validations where 
         user_id = (select id from users where employee_id = ?) and Reponse = "Accorder")', [24]);
         */
        $auth = Auth::user()->employee_id;
        $grade_auth = DB::table('grades')->where('id', function($query) use($auth){
                                                        $query->from('employees')
                                                        ->where('id',$auth )
                                                        ->select('grade_id');
                                                    })->pluck('ponderation')->first();
                                                 
        /* $auth_user = DB::select('SELECT MAX(T_Journalier) from grades where T_Journalier < 
        (select T_Journalier from grades where id =
        (select grade_id from employees where id = ? )) ',[$auth]);  */

        //determiner le sub direct
        //determiner
        $valid_direct = DB::table('employees')->wherein('id', $A_emp_val)
                                              ->wherein('grade_id', function($q) use($grade_auth)
                                                {
                                                    $q->from('grades')
                                                    ->orderBy('ponderation')
                                                    ->where( 'ponderation', (int)json_encode($grade_auth) -1 )
                                                    ->select('id');
                                                }
                                                
                                                )->pluck('id');

                                                
                                                $bs = preg_split("/[,\]\[ ]/",json_encode($valid_direct),-1, PREG_SPLIT_NO_EMPTY);
                                                
                                                foreach($bs as $b){
                                                    $array[] =(int)$b; 
                                                }
                                                
                                                   
                                                
                                      $r = DB::table('validations')
                                      ->where('user_id',Auth::user()->id)
                                                  ->pluck('demande_id');
                                    $ress = preg_split("/[,\]\[ ]/",json_encode($r),-1, PREG_SPLIT_NO_EMPTY);
                                    
                                    foreach($ress as $res){
                                        $Ar[] =(int)$res; 
                                    }
                                        

                                                  

if(empty($Ar)){$Ar = [0];}

    $demandes = DB::table('demandes')->wherein('id', function($q) use($array,$auth)
                                            {
                                                $q->from('validations')
                                                  ->wherein( 'user_id', function($query) use($array,$auth)
                                                  {
                                                    $query->from('users')
                                                          ->wherein('employee_id',$array)
                                                          
                                                          ->select('id');
                                                   }

                                                  )
                                                  ->where('user_id', '<>', Auth::user()->id)
                                                  ->where('Reponse', 'Accorder')

                                                  ->select('demande_id');
                                            }
                                        )
                                        
                                        ->whereNotIn('id',$Ar)
                                        ->get();
                                        
    
    } 
    
    
        
        
         


/*         $demandes = Demande::with('accompagnateurs')->get();*/
        /* $users_validation = DB::select('SELECT * from users where id 
        in (select user_id from role_user where role_id = (select id from roles where name = "validation" ))') ;
         */
        return view('validation.users.index', compact('demandes'));
        }
        dd('you need to have the validator role');

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreValidationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidationRequest $request)
    {
        $data_val = new Validation([    
            'user_id' =>$request->GET('redacteur'),
            'demande_id' => $request->GET('demande'),
            'Reponse'=> $request->GET('decision'),
            'Motif_Validation'=> $request->GET('motif'),
        ]);
        $data_val->save();
        
        $request->session()->flash('success', 'DEMANDE TREATED');
        return redirect(route('validation.users.index'));
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function show(Validation $validation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function edit(Validation $validation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateValidationRequest  $request
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValidationRequest $request, Validation $validation)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validation $validation)
    {
        //
    }
}
