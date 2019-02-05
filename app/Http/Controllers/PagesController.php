<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\College;
use App\Dept;

class PagesController extends Controller
{
    //
    public function index() {

        $scholars_count = Scholar::all()->count();
        $colleges_count = College::all()->count();
        $depts_count = Dept::all()->count();
        $guides_count = Guide::all()->count();
        $data = array('sc' => "$scholars_count", 'cc' =>"$colleges_count", 'dc' => "$depts_count", 'gc' => "$guides_count");
        return view('pages.welcome')->with('data',$data);


    }
}
?>