<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Gestion;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Destination;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Deplacement;
use App\Http\Requests\StoreDeplacementRequest;
use App\Http\Requests\UpdateDeplacementRequest;

class DeplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Http\Requests\StoreDeplacementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeplacementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deplacement  $deplacement
     * @return \Illuminate\Http\Response
     */
    public function show(Deplacement $deplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deplacement  $deplacement
     * @return \Illuminate\Http\Response
     */
    public function edit(Deplacement $deplacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeplacementRequest  $request
     * @param  \App\Models\Deplacement  $deplacement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeplacementRequest $request, Deplacement $deplacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deplacement  $deplacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deplacement $deplacement)
    {
        //
    }
}
