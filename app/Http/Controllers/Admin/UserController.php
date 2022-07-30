<?php

namespace App\Http\Controllers\Admin;
use App\models\Role;
use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if(Gate::denies('logged_in')){
            dd('no access allowed');
        }

        if(Gate::allows('is-admin')){
           
            $users = User::with('roles')->get();
            return view('admin.users.index',compact('users'));
            //return view('admin.users.index', ['users'=> User::with('roles')->get()]);

        }
        dd('you need to be admin');
       //$users = User::all();
       //return view('admin.users.index')->with(['users' => $users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['roles'=> Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validateData = $request->validate(['name'=>'required', 'email'=>'required|unique:users', 'password'=>'required|min:8']);

            $user = User::create($request->except(['_token','roles']));

            $user->roles()->sync($request->roles);

            $request->session()->flash('success', 'USER CREATED');

            return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit',
        ['roles'=> Role::all()],
        ['users'=> User::find($id)]
    );


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
 
        $user = User::findOrFail($id);

        if(!$user){
            $request->session()->flash('error', 'EDITING FAILURE');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token','roles']));

        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'USER EDITED');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'USER DELETED');
        return redirect(route('admin.users.index'));
    }
}
