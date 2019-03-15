<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Email;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emails = Email::all();
        return $emails;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('emails.createemail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'email_name' => 'required',
            'email_layout' => 'required'
        ]);
        $email_lines = explode("\r\n",$request->email_layout);
        $email_layout = "";
        foreach($email_lines as $line) {
            $email_layout= $email_layout.$line."<br />";
        }
      
        try {
            $url = "emails/"."$request->email_name"."blade.php";
            $e = new Email();
            $e->name = $request->email_name;
            $e->layout = $url;
            $e->save();
            Storage::disk('local')->put("emails/"."$request->email_name"."blade.php",$email_layout);
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    } 
    public function send($id, $vars) {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
