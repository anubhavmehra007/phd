<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\Dept;
use App\College;

class ScholarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholars = Scholar::all();
        $data = array();
        foreach($scholars as $scholar) {
            $guide_id = $scholar->guide_id;
            $guide = Guide::where('id', $guide_id)->first();
            $dept_id = $guide->dept_id;
            $college_id = $guide->college_id;
            $college = College::where('id', $college_id)->first();
            $dept = Dept::where('id', $dept_id)->first();
            $scholar_data = array(['name' => $scholar->name, 'guide' => $guide->name, 'dept' =>
            $dept->name, 'college' => $college->name, 'yoj' => $scholar->y_o_j, 'yoc' => $scholar->y_o_c, 'eta' => $scholar->eta, 'course' => $scholar->course_work]);
            array_push($data, $scholar_data);


        }
 //return $data;
       return view('scholars.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        return view('scholars.createscholars');
        
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
            'name' => 'required',
            'y_o_j' => 'required',
            'y_o_c' => 'required',
            'eta' => 'required',
            'course_work' => 'required',
            'guide' => 'required',
            'dept' => 'required',
            'college' => 'required'
        ]);
        //Changing all text values to uppercase letters.
        $request->college = strtoupper($request->college);
        $request->guide = strtoupper($request->guide);
        $request->dept = strtoupper($request->dept);
        $request->name = strtoupper($request->name);

       //Model Object Creation 
        $scholar = new Scholar();
        $dept = new Dept();
        $college = new College();
        $guide = new Guide();

        //Trying to create new College Entry
        try{
        $college->name = $request->college;
        $college->save();
        }
        catch(\Exception $e) {
           //Means the College already exist
        }

        $college = College::where('name', $request->college)->first();
        $college_id = $college->id; 
        //Trying to create new Department entry
        try {
        $dept->name = $request->dept;
        $dept->save();
        }
        catch(\Exception $e) {
            //Means the Department already exist
        }

        $dept = Dept::where('name', $request->dept)->first();
        $dept_id = $dept->id;
        
        //Trying to perform new Guide Entry
        try{
        $guide->name = $request->guide;
        $guide->dept_id = $dept_id;
        $guide->college_id = $college_id;
        $guide->save();
        }
        catch(\Exception $e) {
            //Means this guide already exist
        }
        $guide = Guide::where('name', $request->guide)->first();
        $guide_id = $guide->id;


        $scholar->name = $request->name;
        $scholar->y_o_j = $request->y_o_j;
        $scholar->y_o_c = $request->y_o_c;
        $scholar->eta = $request->eta;
        $scholar->guide_id = $guide_id;
        if ($request->course_work == '0') {
            $scholar->course_work = 0;

        }
        else {
            $scholar->course_work = 1;
        }
        $scholar->save();
        return redirect('/scholars')->with('success','Entry Done');
        




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
}
