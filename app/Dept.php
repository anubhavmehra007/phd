<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guide;
class Dept extends Model
{
    //
    public $timestamps = true;
    public function guides(){
        return $this->hasMany('App\Guide');
    }
    public function scholars(){
        return $this->hasMany('App\Scholar');
    }

}
