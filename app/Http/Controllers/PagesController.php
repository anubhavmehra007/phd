<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\College;
use App\Dept;
use Mail;

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
    public function email() {
       
        $to_name = 'Anubhav Mehra';
        $to_email = 'hembhattku@gmail.com';
        $data = array('name'=>"Anubhav Mehra", "body" => "Chacha Bahut Naraz hai.");
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $from_email = 'csdsbku@gmail.com';
            $from_name = 'KU Admin';
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from($from_email,$from_name);
            return "Done";
});
    }
}
?>