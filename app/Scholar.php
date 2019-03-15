<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    //
    public $timestamps = false;
    public function guide(){
        return $this->belongsTo("App\Guide");
    }
    public function thesis() {
        return $this->hasMany("App\Thesis");
    }
}
