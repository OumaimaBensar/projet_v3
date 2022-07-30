<?php
namespace App\Http\Controllers\Redacteur_dem;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Destination;
use App\Models\User;
use App\Models\Employee;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use Illuminate\Support\Facades\DB;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $demandes = Demande::with('accompagnateurs')->get();
        
        return view('redacteur_dem.users.index', compact('demandes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emps = Employee::all();
        $destinations = Destination::all();
        return view('redacteur_dem.users.create', compact('emps','destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDemandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDemandeRequest $request)
    {

       

            $data_dem = new Demande([
                
                'user_id' =>$request->GET('redacteur'),
                'employee_id' => $request->GET('Resp'),
                'date_depart'=> $request->GET('trip-start'),
                'date_arrive'=> $request->GET('trip-end'),
                'destination_id'=> $request->GET('destination'),
                'Moyen'	=> $request->GET('moyen'),
                'motif'	=> $request->GET('motif'),
                
            ]);
            $data_dem->save();
            $data_dem->accompagnateurs()->attach($request->Accampagnateurs);
            

            
            $request->session()->flash('success', 'DEMANDE CREATED');
            return redirect(route('redacteur_dem.users.index'));
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemandeRequest  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
