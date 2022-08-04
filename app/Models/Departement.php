<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany('App\Models\Employee');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction');
    }

    public function services(){
        return $this->hasMany('App\Models\Service');
    }

}
