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

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::with('accompagnateurs')->get();
        
        return view('validation.users.index', compact('demandes'));
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
        //
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
