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
            'eta' => $scholar->eta, 'course' => $scholar->course_work, 'internal' => $scholar->internal, 'external' => $scholar->external);
            array_push($data, $scholar_data);


        }

       return view('scholars.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $colleges = College::all();
       $depts = Dept::all();
       $guides_c = Guide::all();
       $guides =  $guides_c->groupBy([
        'college_id',
        function ($item) {
            return $item['dept_id'];
        },
    ], $preserveKeys = false);
       $college_data = array();
       $dept_data = array();
       $guide_data = array();
       $deptwise = array();
       $collegewise = array();
       $dept_flag = 0;
       $college_flag = 0;
       foreach($colleges as $college) {
           $college_data["$college->id"] = "$college->name";
       }
       foreach($depts as $dept) {
        $dept_data["$dept->id"] = "$dept->name";
        

    }


       $data = array('cd' => $college_data, 'dd' => $dept_data, 'gd'=>$guides);
       return view('scholars.createscholars')->with('data', $data);
        
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
            'email' => 'required|email|unique:scholars,email',
            'father_name' => 'required',
            'mobile_no' => 'required|numeric|size:10',
        ]);
        //Changing all text values to uppercase letters.
        
        $request->name = strtoupper($request->name);
        

        //Model Object Creation 
        $scholar = new Scholar();
        
        /*if(isset($request->internal)) {
            $internal = $request->internal;
        
        }
        else {
            $internal = 0;
        }
        if(isset($request->external)) {
            $external = $request->external;
        
        }
        else {
            $external = 0;
        }*/
        

        

        $scholar->name = $request->name;
        $scholar->email = $request->email;
        $scholar->y_o_j = $request->y_o_j;
        $scholar->y_o_c = $request->y_o_c;
        $scholar->eta = $request->eta;       
        $scholar->guide_id = $request->guide;
        //$scholar->external = $external;
        //$scholar->internal = $internal;
        if ($request->course_work == '0') {
            $scholar->course_work = 0;
            $scholar->internal_1 = 0;
            $scholar->internal_2 = 0;
            $scholar->internal_3 = 0;
            $scholar->external_1 = 0;
            $scholar->external_2 = 0;
            $scholar->external_3 = 0;

        }
        else {
            $scholar->course_work = 1;
            $scholar->internal_1 = $request->internal_p1;
            $scholar->internal_2 = $request->internal_p2;
            $scholar->internal_3 = $request->internal_p3;
            $scholar->external_1 = $request->external_p1;
            $scholar->external_2 = $request->external_p2;
            $scholar->external_3 = $request->external_p3;
        }

        $scholar->enroll_no = $request->enroll_num;
        $scholar->roll_no = $request->roll_num;
        $scholar->father_name = $request->father_name;
        $scholar->mobile_number = $request->mobile_no;

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
