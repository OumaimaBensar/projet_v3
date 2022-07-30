<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }

    //accompagnateur(Employee)<---relation one to many ---> demande
    public function acc_demandes(){
        return $this->belongsToMany('App\Models\demande');
    }

    //responsable(Employee)<---relation one to many ---> demande
    public function resp_demandes(){
        return $this->hasMany('App\Models\demande');
    }

    
}
