<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


function get_sub_emp()
 {//first for this authenticated user we are getting the id of the corresponding employee 
 $user_id = Auth::user()->employee_id;

 //then we are getting all the info of the employee using the id that we got.
 
    /* $emp_user = DB::table('employees')->where('id','=', $user_id); */ 
     $emp_user = DB::select('SELECT * from employees where id = ?',[ $user_id]);
 
  //then because i m getting an array and inside of it there is objects  [{ 'name' => 'amine}]
   //i add those two lines to make it an array 
   //i know that this is not at all practical but i m test now 
     $res = $emp_user[0];
     $array = (array) $res;
  
     //then we get to the best part the idea is 
     // lets first see an exemple :
     // imagine that the user in a director so the direction name != none 
     // but the departement and service names are = none
     // i m getting these info from what you can see in these 3 lines bellow:
     $Dir = DB::select('SELECT Dir_name from directions where id = ?' , [$array['direction_id'] ]);
     $dep = DB::select('SELECT Dep_name from departements where id = ?' , [$array['departement_id'] ]);
     $service = DB::select('SELECT S_name from services where id = ?' , [$array['service_id'] ]);
 
     $array0 = (array) $Dir[0];
     $array1 = (array) $dep[0];
     $array2 = (array) $service[0];
 
 // then this 'if' : because the direction is not none it will skip the first if
 
     if($array0['Dir_name']== 'none'){
     $emps = DB::select('SELECT * FROM employees where  direction_id <> ? ',[$array['direction_id'] ]);
     
     } 
     // the dep in none so it will be selecting all the employees from the employees 
     // table that have the same direction as the user and a departement that belongs 
     //to the same diraction but != none (this last condition on dep is trivial 
     // because  if there is someone having none as dep_name , the query will give 
     //only those from the same direction )
 
     elseif($array1['Dep_name']== 'none'){        
       $emps = DB::select('SELECT * FROM employees as em where  em.direction_id = ? and departement_id in 
       (SELECT id from departements as dep where dep.direction_id = ? ) '
       ,[$array['direction_id'], $array['direction_id'] ]);
 
       
      }
     elseif($array2['S_name']== 'none'){
         $emps = DB::select('SELECT * FROM employees where direction_id = ? and departement_id = ? && service_id in 
         (SELECT id from services where departement_id = ? ) 
          ',[$array['direction_id'], $array['departement_id'], $array['departement_id'] ]);
     }
     else{
         $emps = DB::select('SELECT * FROM employees where service_id = ? and grade_id > ?', [ $array['service_id'], $array['grade_id']]);
     }
   
     return $emps;
    }


