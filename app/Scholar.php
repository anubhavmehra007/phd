<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    //
    public function guide(){
        return $this->belongsTo("App\Guide");
    }
}
