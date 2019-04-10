<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    //
    public function scholar() {
        return $this->belongsToMany("App\Scholar");
    }
}
