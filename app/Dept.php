<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guide;
class Dept extends Model
{
    //
    
    public function guides(){
        return $this->hasMany('App\Guide');
    }
}
