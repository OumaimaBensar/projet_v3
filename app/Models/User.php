<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
 
    public function roles(){
        return $this->belongsToMany('App\Models\role');
    }


    //check if the user has a role
    public function hasAnyRole(string $role){
        return null !==  $this->roles()->where('name', $role)->first();
    }

    //check if the user has any given roles
    public function hasAnyRoles($roles){
        return null !==  $this->roles()->whereIn('name', $role)->first();
    }

    //check if the user is an employee
    /* public function isEmployee(){
        $email = $this->email;
        $is_emp = DB::table('employees')
                    ->where('mail_prof', $email)->first();
        return $is_emp;
    } */

//-------------------------------

//user<---relation one to many ---> demande
    public function demandes(){
    return $this->hasMany('App\Models\Demande');
}

public function validations(){
    return $this->hasMany('App\Models\Validation');
}

public function employee(){
    return $this->hasOne('App\Models\Employee');
}

public function affectations(){

    return $this->hasMany('App\Models\Affectation');
}

public function deplacements(){

    return $this->hasMany('App\Models\Deplacement');
}

}
