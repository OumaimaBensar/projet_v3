<?php

namespace App\Http\Controllers\Gestion;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Affectation;
use Illuminate\Http\Request;

use App\Http\Requests\StoreAffectationRequest;
use App\Http\Requests\UpdateAffectationRequest;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('marque')->get();
        $employees = Employee::all();
        $drivers = Driver::all();

        $affectations = Affectation::with('employee','car','driver')->get();

        return view('GestionMission.affectations.index', compact('cars', 'employees','drivers','affectations'));
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
     * @param  \App\Http\Requests\StoreAffectationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAffectationRequest $request)
    {
        $affectations = Affectation::create($request->except(['_token']));

        $request->session()->flash('success', ' AFFECTATION AJOUTEE ');

        return redirect(route('GestionMission.affectations.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function show(Affectation $affectation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function edit(Affectation $affectation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAffectationRequest  $request
     * @param  \App\Models\Affectation  $affectation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAffectationRequest $request, Affectation $affectation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Affectation::destroy($id);
        $request->session()->flash('success', 'AFFECTATION DELETED');
        return redirect(route('GestionMission.affectations.index'));    }
}
