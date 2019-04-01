<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    public $timestamps = true;
    public function guides() {
        
        return $this->hasMany("App\Guide");
    }
}
