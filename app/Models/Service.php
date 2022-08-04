<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }

    public function departement(){
        return $this->belongsTo('App\Models\Departement');
    }

    
}
