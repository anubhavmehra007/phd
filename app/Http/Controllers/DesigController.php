<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Desig;
use Illuminate\Validation\Rule;
use Session;

class DesigController extends Controller
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
        $desigsnatons = Desig::all();
        return view('designations.index')->with('desigsnatons',$desigsnatons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designations.createdesignation');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Validation 
       $this->validate($request,[
        'designation' => 'required|unique:desigs,post',
        'num_of_sch' => 'required|numeric',        
        ]);
        //Changing all text values to uppercase letters.    
        $request->designation = strtoupper($request->designation);
        //Model Object Creation 
        $designation = new Desig();
        $designation->post = $request->designation;
        $designation->last_edited_by = Auth::user()->email;
        $designation->no_of_scholars = $request->num_of_sch;
        $designation->save();
        return redirect('/designations')->with('success','Designation Created!');
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
        $designation = Desig::find($id);        
        return view('designations.edit')->with('designation',$designation);
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
        //Validation 
       $this->validate($request,[
        'post' => 'required|unique:desigs,post',
        'post' => Rule::unique('desigs')->ignore($id, 'id'),
        'no_of_scholars' => 'required|numeric',        
        ]);

        //Changing all text values to uppercase letters.    
        $request->designation = strtoupper($request->designation);
        //Model Object Creation 
        $designation = Desig::find($id);;
        $designation->post = $request->post;
        $designation->no_of_scholars = $request->no_of_scholars;
        $designation->save();
        return redirect('/designations')->with('success','Designation Updated!');
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
