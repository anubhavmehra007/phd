<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\Dept;
use App\College;
use Illuminate\Validation\Rule;
use Session;


class ScholarsController extends Controller
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
        $scholars = Scholar::all();    
         return view('scholars.index')->with('scholars', $scholars);
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
            'mobile_no' => 'required|numeric',
        ]);
        
        //Changing all text values to uppercase letters.
        
        $request->name = strtoupper($request->name);
        

        //Model Object Creation 
        $scholar = new Scholar();
        
        $scholar->name = $request->name;
        $scholar->email = $request->email;
        $scholar->y_o_j = $request->y_o_j;
        $scholar->y_o_c = $request->y_o_c;
        $scholar->eta = $request->eta;  
        $scholar->last_edited_by = Auth::user()->email;     
        $scholar->guide_id = $request->guide;
        $scholar->dept_id = $request->dept;
        $scholar->college_id = $request->college;
        
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
        $scholar = Scholar::find($id);
        return view('scholars.show')->with('scholar',$scholar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scholar = Scholar::find($id);
        $college_list = College::all();
        $colleges=array();
        foreach($college_list as $college){
            $colleges[$college->id] = $college->name;
        }
        $subject_list = Dept::all();
        $subjects=array();
        foreach($subject_list as $subject){
            $subjects[$subject->id] = $subject->name;
        }
        $guide_list=Guide::where('dept_id', '=', $scholar->guide->dept_id)
                        ->where('college_id', '=', $scholar->guide->college_id)
                        ->get();
       $guides=array();
        foreach($guide_list as $guide){
            $guides[$guide->id] = $guide->name;
        }
       return view('scholars.edit')->with('scholar',$scholar)->with('colleges',$colleges)->with('subjects',$subjects)->with('guides',$guides);
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
        //validate the data
       $this->validate($request,array(
            'name' => 'required',
            'email' => 'required|email|unique:scholars,email',
            'email' => Rule::unique('scholars')->ignore($id, 'id'),
            'father_name' => 'required',
            'mobile_number' => 'required|numeric',
            'y_o_j' => 'required',
            'y_o_c' => 'required',
            'eta' => 'required',
            'course_work' => 'required',
            'guide' => 'required',
            'dept' => 'required',
            'college' => 'required',      
            ));            

        //Changing all text values to uppercase letters.        
        $request->name = strtoupper($request->name);        

        //update in the database
        $scholar=Scholar::find($id);        
        $scholar->name = $request->name;
        $scholar->email = $request->email;
        $scholar->y_o_j = $request->y_o_j;
        $scholar->y_o_c = $request->y_o_c;
        $scholar->eta = $request->eta;       
        $scholar->guide_id = $request->guide;
        
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
            $scholar->internal_1 = $request->internal_1;
            $scholar->internal_2 = $request->internal_2;
            $scholar->internal_3 = $request->internal_3;
            $scholar->external_1 = $request->external_1;
            $scholar->external_2 = $request->external_2;
            $scholar->external_3 = $request->external_3;
        }

        $scholar->enroll_no = $request->enroll_no;
        $scholar->roll_no = $request->roll_no;
        $scholar->father_name = $request->father_name;
        $scholar->mobile_number = $request->mobile_number;
        $scholar->save();
        Session::flash('success','Scholar details updated successfully!');
        //redirect to anothe page
        return redirect()->route('scholars.show',$scholar->id);
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

    public function ajaxRequest(Request $request)
    {
        //validate the data
        $validator=\Validator::make($request->all(), [
            'clg_id' => 'required',
            'subject_id' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $guide_list=Guide::where('dept_id', '=', $request->subject_id)
                        ->where('college_id', '=', $request->clg_id)
                        ->get();

        $html=  '<label for="guide">Guide</label><select class="form-control" id="guides_list" required="required" name="guide"><option value="">Select Guide</option>';       
        foreach($guide_list as $guide){
            $html.= '<option value="'.$guide['id'].'">'.$guide['name'].'</option>';
        }
           $html.='</select>';                                      
                        
        return response()->json(['success'=>true,'guide_list'=>$html]);    
    }
}
