<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function marque(){
        return $this->belongsTo('App\Models\Marque');
    }

    public function affectations(){

        return $this->hasMany('App\Models\Affectation');
    }
}
