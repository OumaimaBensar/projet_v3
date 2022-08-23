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

    public function direction(){
        return $this->belongsTo('App\Models\Direction');
    }

    public function departement(){
        return $this->belongsTo('App\Models\Departement');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function affectations(){

        return $this->belongsTo('App\Models\Affectation');
    }
    
}
