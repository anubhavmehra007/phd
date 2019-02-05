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
            $guide = Guide::find( $guide_id);
            $dept_id = $guide->dept_id;
            $college_id = $guide->college_id;
            $college = College::find( $college_id);
            $dept = Dept::find( $dept_id);
            $scholar_data = array('name' => $scholar->name, 'guide' => $guide->name, 'dept' =>
            $dept->name, 'college' => $college->name, 'yoj' => $scholar->y_o_j, 'yoc' => $scholar->y_o_c, 
            'eta' => $scholar->eta, 'course' => $scholar->course_work);
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
            'college' => 'required',
            'email' => 'required|email|unique:scholars,email'
        ]);
        //Changing all text values to uppercase letters.
        $request->college = strtoupper($request->college);
        $request->guide = strtoupper($request->guide);
        $request->dept = strtoupper($request->dept);
        $request->name = strtoupper($request->name);

       //Model Object Creation 
        $scholar = new Scholar();
        

        
        

        $dept = Dept::where('name', $request->dept)->first();
        $dept_id = $dept->id;
        
       
       
        $guide = Guide::where('name', $request->guide)->first();
        $guide_id = $guide->id;


        $scholar->name = $request->name;
        $scholar->name = $reuqest->email;
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
