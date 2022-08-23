<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deplacement extends Model
{
    use HasFactory;

    protected $guarded = [];  


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function car(){
        return $this->belongsTo('App\Models\Car');
    }

    public function driver(){
        return $this->belongsTo('App\Models\Driver');
    }
}
