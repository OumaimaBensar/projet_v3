<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function affectations(){

        return $this->hasMany('App\Models\Affectation');
    }

    public function deplacements(){

        return $this->hasMany('App\Models\Deplacement');
    }
}
