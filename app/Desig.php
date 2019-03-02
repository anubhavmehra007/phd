<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desig extends Model
{
    //
    public $timestamps = false;
    public function guides() {
        $this->hasMany("App\Guide");
    }
}
