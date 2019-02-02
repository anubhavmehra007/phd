<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    public function scholars(){
        return $this->hasMany("App\Scholar");
    }
    public function dept(){
        return $this->belongsTo("App\Dept");
    }
    public function college(){
        return $this->belongsTo("App\College");
    }
}
