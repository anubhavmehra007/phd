<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\Dept;
use App\College;
use App\Desig;
use Session;
use Illuminate\Validation\Rule;


class GuidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::all();        
        return view('guides.index')->with('guides', $guides);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges_db = College::all();
        $depts_db = Dept::all();
        $desigs_db = Desig::all();        
        $colleges = array();
        $depts = array();
        $desigs = array();
       
        foreach($colleges_db as $college) {
            
            
            $colleges["$college->id"] = "$college->name";
        }
        
        foreach($depts_db as $dept) {
           
            $depts["$dept->id"] = "$dept->name";
        }

        foreach($desigs_db as $desig) {
           
            $desigs["$desig->id"] = "$desig->post";
        }
        $data = array('cd' => $colleges, 'dd' => $depts, 'designation' => $desigs);
        
        return view('guides.createguides')->with('data', $data);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:guides,email',
            'college' => 'required',
            'dept' => 'required',
            'designtion' => 'required',
            'mobile_no' => 'required|numeric'
        ]);

        $request->name = strtoupper($request->name);
        $guide = new Guide();
        $guide->name = $request->name;
        $guide->email = $request->email;
        $guide->dept_id = $request->dept;
        $guide->college_id = $request->college;
        $guide->desig_id = $request->designtion;
        $guide->mobile_number = $request->mobile_no;
        $guide->save();
        Session::flash('success','Guide Added!');       
        return view('guides.index');   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guide = Guide::find($id);
        return view('guides.show')->with('guide',$guide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide = Guide::find($id);
        $college_list = College::all();
        $colleges=array();
        foreach($college_list as $college){
            $colleges[$college->id] = $college->name;
        }
        $desigs_list = Desig::all();
        $desigs=array();
        foreach($desigs_list as $desig){
            $desigs[$desig->id] = $desig->post;
        }
        $subject_list = Dept::all();
        $subjects=array();
        foreach($subject_list as $subject){
            $subjects[$subject->id] = $subject->name;
        }
        return view('guides.edit')->with('guide',$guide)->with('colleges',$colleges)->with('subjects',$subjects)->with('designations',$desigs);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:guides,email',
            'email' => Rule::unique('guides')->ignore($id, 'id'),
            'college_id' => 'required',
            'dept_id' => 'required',
            'desig_id' => 'required',
            'mobile_number' => 'required|numeric'
        ]);

        $request->name = strtoupper($request->name);
        $guide = Guide::find($id); 
        $guide->name = $request->name;
        $guide->email = $request->email;
        $guide->dept_id = $request->dept_id;
        $guide->college_id = $request->college_id;
        $guide->desig_id = $request->desig_id;
        $guide->mobile_number = $request->mobile_number;
        $guide->save();
        Session::flash('success','Guide details updated successfully!');
        //redirect to anothe page
        return redirect()->route('guides.show',$guide->id);         
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
