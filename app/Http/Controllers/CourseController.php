<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $person = DB::table('person')
        // ->join('student','person.id', '=','student.id')
        // ->join('l1','person.id', '=','l1.id')
        // // ->join('l2','person.id', '=','l2.id')
        // // ->join('l3','person.id', '=','l3.id')
        // // ->join('l4','person.id', '=','l4.id')
        // ->select('student.*','person.name','l1.*')
        // ->get();

        // $course = DB::table('course')
        // ->join('y1course','course.desig','=','y1course.desig')
        // ->join('y2course','course.desig','=','y2course.desig')
        // ->join('y3course','course.desig','=','y3course.desig')
        // ->join('y4course','course.desig','=','y4course.desig')
        // ->select('course.*')->get();
        // dd($person);

        $l1 = DB::table('l1')
        ->join('person','l1.id','=','person.id')
        ->join('course','l1.desig', '=','course.desig')
        ->select('person.*','course.*','l1.*')->get();

        $l2 = DB::table('l2')
        ->join('person','l2.id','=','person.id')
        ->join('course','l2.desig', '=','course.desig')
        ->select('person.*','course.*','l2.*')->get();

        $l3 = DB::table('l3')
        ->join('person','l3.id','=','person.id')
        ->join('course','l3.desig', '=','course.desig')
        ->select('person.*','course.*','l3.*')->get();

        $l4 = DB::table('l4')
        ->join('person','l4.id','=','person.id')
        ->join('course','l4.desig', '=','course.desig')
        ->select('person.*','course.*','l4.*')->get();

        // dd($pepek);


        return view('coba',['l1' => $l1, 'l2' => $l2, 'l3' => $l3, 'l4' => $l4]);
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
