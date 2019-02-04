<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Guide;
use App\Dept;
use App\College;

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
        $data = array();
        foreach($guides as $guide) {
            $college = College::find($guide->college_id);
            $dept = Dept::find($guide->dept_id);
            $no_of_scholars = Scholar::where('guide_id',$guide->id)->count();
            array_push($data, ['guide_name' => $guide->name, 'college_name' => $college->name, 'dept_name' => $dept->name, 'scholars' => "$no_of_scholars"]);
            
        }
        return view('guides.index')->with('data', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
