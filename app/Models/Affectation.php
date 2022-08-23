<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $guarded = [];  


    public function employee(){
        return $this->hasOne('App\Models\Employee');
    }

    public function car(){
        return $this->belongsTo('App\Models\Car');
    }

    public function driver(){
        return $this->belongsTo('App\Models\Driver');
    }
}
