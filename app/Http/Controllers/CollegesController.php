<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\College;
use App\User;
use App\Guide;
use App\Scholar;
use Session;

class CollegesController extends Controller
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
        $colleges = College::all();
        //$guides   = Guide::all();
        //$scholars = Scholar::all();
        return view('college.index')->with('colleges',$colleges);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('college.createcollege');
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
            'college_name' => 'required|unique:colleges,name',            
        ]);
        
        //Model Object Creation 
        $college = new College;
        $college->name = strtoupper($request->college_name);
        $college->last_edited_by = Auth::user()->email;
        $college->save();
        Session::flash('success','College Registered!');
        return redirect('/colleges');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college = College::find($id);
        $last_edited = User::where('email',$college->last_edited_by)->first();
        return view('college.show')->with('college',$college)->with('last_edited',$last_edited);
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
        //Validation 
        $this->validate($request,[
            'name' => 'required|unique:colleges,name',
            'name' => Rule::unique('colleges')->ignore($id, 'id'),            
        ]);

        //Model Object Creation 
        $college = College::find($id);;
        $college->name = strtoupper($request->name);
        $college->last_edited_by = Auth::user()->email;
        $college->save();
        Session::flash('success','College Detail Updated!');
        return redirect()->back();
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