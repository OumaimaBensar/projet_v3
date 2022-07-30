<?php

namespace App\Http\Controllers;

use App\Models\Authorisation;
use App\Http\Requests\StoreAuthorisationRequest;
use App\Http\Requests\UpdateAuthorisationRequest;

class AuthorisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAuthorisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorisationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authorisation  $authorisation
     * @return \Illuminate\Http\Response
     */
    public function show(Authorisation $authorisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authorisation  $authorisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Authorisation $authorisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorisationRequest  $request
     * @param  \App\Models\Authorisation  $authorisation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorisationRequest $request, Authorisation $authorisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authorisation  $authorisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authorisation $authorisation)
    {
        //
    }
}
