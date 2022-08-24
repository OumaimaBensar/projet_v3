<?php

namespace App\Http\Controllers\Gestion;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Destination;
use App\Models\User;
use App\Models\Employee;
use App\Models\Deplacement;

use Barryvdh\DomPDF\Facade\Pdf;

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
                    })
                    ->where('deplacement_id',NULL)
                    ->get();


        $voitures = DB::table('cars')->whereNotIn('id',function($q){
                                        $q->from('affectations')
                                          ->select('car_id');
                                    })->get();

        $conducteurs = DB::table('drivers')->whereNotIn('id',function($q){
            $q->from('affectations')
              ->where('driver_id','<>',NULL)
              ->select('driver_id');
        })->get();
           
        $deps = Demande::join('deplacements', 'demandes.deplacement_id', '=', 'deplacements.id')
        ->whereDate('deplacements.created_at', DB::raw('CURDATE()'))
        ->get(['deplacements.*','demandes.*']);

        
        

        return view('GestionMission.users.index', compact('demandes','voitures','conducteurs','deps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deps = Deplacement::create($request->except(['_token','mycheckboxes']));

        $r = DB::table('demandes')
        ->wherein('id', $request->mycheckboxes)
        ->update(
            [
                'deplacement_id' => $deps->id
            ]
        );

        
       

        $request->session()->flash('success', ' DEPLACEMENT AJOUTEE ');

        return redirect(route('GestionMission.users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $demande = Demande::findOrFail($id);

        if(!$demande){
            $request->session()->flash('error', 'DEMANDE NOT FOUND');
            return redirect(route('GestionMission.users.index'));
        }

        $deps = Demande::join('deplacements', 'demandes.deplacement_id', '=', 'deplacements.id')
        ->where('demandes.id','=', $demande->id)
        ->whereDate('deplacements.created_at', DB::raw('CURDATE()'))
        ->first(['deplacements.*','demandes.*']);


        $pdf = Pdf::loadView('GestionMission.users.show', compact('deps'));

       $nom = DB::table('employees')->where('id', $deps->employee_id)->get('nom');
       $prenom = DB::table('employees')->where('id', $deps->employee_id)->get('prenom');


        return $pdf->download($nom .'_'.$prenom. '.pdf');


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

    /* public function Pdf()
    {
        dd('yes i m here');
    } */

}
