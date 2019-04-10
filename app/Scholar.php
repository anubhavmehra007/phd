<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    //
    public $timestamps = true;
    public function guide(){
        return $this->belongsTo("App\Guide");
    }
    public function thesis() {
        return $this->hasMany("App\Thesis");
    }
    public function college(){
        return $this->belongsTo("App\College");
    }
    public function dept(){
        return $this->belongsTo("App\Dept");
    }
    public function reviewer() {
        return $this->belongsToMany("App\Reviewer");
    }
}
