<?php

namespace App\Http\Controllers\Gestion;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Destination;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GestionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $demandes = DB::table('demandes')
                    ->wherein('id', function($q1){
                        $q1->from('validations')
                          ->where('user_id', function($q2){
                            $q2->from('users')
                                  ->where('employee_id', function($q3){
                                        $q3->from('employees')
                                           ->where('grade_id', function($q4){
                                                $q4->from('grades')
                                                   ->where('G_name', 'Directeur General')
                                                   ->select('id');
                                                })
                                           ->select('id');
                                  })
                                  ->select('id');
                          })
                          ->select('demande_id');
                    })->get();

        return view('GestionMission.users.index', compact('demandes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
