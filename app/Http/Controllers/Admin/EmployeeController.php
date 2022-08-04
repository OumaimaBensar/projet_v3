<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Employee;
use App\Models\Direction;
use App\Models\Departement;
use App\Models\Service;
use App\Models\Modele;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::with('grade')->get();

        return view('admin.fonctionnaire.index', compact('emps')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $dirs = Direction::all();
        $deps = Departement::all();
        $services = Service::all();
        $emps = Employee::all();
        $grades = Grade::all();
        return view('admin.fonctionnaire.create',compact('dirs',
                                                 'deps',
                                                 'services',
                                                 'emps','grades'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {

 /*       

        $file = $request->file('import_file');

        Excel::import(new EmployeesImport, $file);

        return redirect()->route('admin.fonctionnaire.index')->with('success', 'the file was imported successfully');
              
        name f_name cin email tele grade Dir dep service exist_car
 */  
$data_emp = new Employee([
                
    'nom' =>$request->GET('name'),
    'prenom' => $request->GET('f_name'),
    'cin'=> $request->GET('cin'),
    'mail_prof'=> $request->GET('email'),
    'num_tele'=> $request->GET('tele'),
    'grade_id'	=> $request->GET('grade'),
    'direction_id'	=> $request->GET('Dir'),
    'departement_id'=> $request->GET('dep'),
    'service_id'	=> $request->GET('service'),
    'V_perso'	=> $request->GET('exist_car'),
    
]);
$data_emp->save();
            $request->session()->flash('success', ' EMPLOYEE CREATED');
            return redirect(route('admin.fonctionnaire.index'));
 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
