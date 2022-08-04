<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }

    public function departements(){
        return $this->hasMany('App\Models\Departement');
    }
}
