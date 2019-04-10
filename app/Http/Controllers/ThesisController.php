<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Thesis;
use App\Mail\thesisApproved;
use App\Mail\thesisRejected;
use Illuminate\Support\Facades\Mail;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        
        $data = array("scholar_id" => $id);
        return view("thesis.create")->with('data', $data);
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
        $this->validate($request, array(
            "title_name" => "required"
        ));
        $title = strtoupper($request->title_name);
        $thesis = new Thesis();
        $thesis->title = $title;
        $thesis->scholar_id = $request->scholar_id;
        $thesis->last_edited_by = Auth::user()->email;
        $thesis->app_status = 0;
        $thesis->save();
        return redirect('/scholars/'.$request->scholar_id);
        
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
    public function approve($id) {
        $thesis = Thesis::find($id);
        $thesis->app_status = 1;
        $thesis->last_edited_by = Auth::user()->email;
        $thesis->save();
        $scholar = $thesis->scholar()->first();
        
        Mail::to($scholar->email)->send(new thesisApproved($thesis));
       
        
        return redirect('scholars/'.$scholar->id);


    }
    public function reject(Request $request) {
        $thesis = Thesis::find($request->id);
        $scholar = $thesis->scholar()->first();
        $thesis->app_status = 2;
        $thesis->last_edited_by = Auth::user()->email;
        $thesis->save();
        Mail::to($scholar->email)->send(new thesisRejected($thesis,$request->reason));
        return redirect('scholars/'.$scholar->id);
    }
    public function rejectForm($id) {
        return view('thesis.reject')->with('id',$id);
    }
}
