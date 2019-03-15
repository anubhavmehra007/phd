<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thesis extends Model
{
    //
    protected $table = "thesis";
    public function scholar() {
        return $this->belongsTo("App\Scholar");
    }
}
