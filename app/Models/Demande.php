<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{


    use HasFactory;

    protected $guarded=[];

    //accompagnateur(Employee(s))<---relation many to many ---> demande
    public function accompagnateurs(){
        return $this->belongsToMany('App\Models\Employee');
    }

    //responsable(Employee)<---relation one to many ---> demande
    public function responsable(){
        return $this->belongsTo('App\Models\Employee');
    }

    //destination<---relation one to many ---> demande
    public function destination(){
        return $this->belongsTo('App\Models\Destination');
    }

    //user<---relation one to many ---> demande
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function validations(){
        return $this->hasMany('App\Models\Validation');
    }


}
