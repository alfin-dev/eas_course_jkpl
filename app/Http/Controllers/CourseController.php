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
        $stud = DB::table('student')->count();
        $staf = DB::table('staff')->count();
        $cour = DB::table('course')->count();
        $inst = DB::table('instructor')->count();
        return view('dashboard',compact('stud','staf','cour','inst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function query1(Request $request){
       //
        $query = strtolower($request->querycoba);
        $pecah = explode(" ", $query);
        $pecah[1] = "*"; // tulisan All diganti *
        $kalimat = implode(" ",$pecah);
            // $query1 = $kalimat;
            // $student = DB::select(DB::raw($query1));
            // dd($student);

        // dd($pecah);
        if($pecah[3]=='student' && count($pecah) <= 4 ){
            $query1 = $kalimat.' join person on person.id = student.id';
            $student = DB::select(DB::raw($query1));
            dd($student);
       }elseif($pecah[3]=='student'){
            // $id = strval($pecah[6]);
            // dd($id);
            // select * from student join person on person.id = student.id and student.id = '0000041'
            // $query1 = $kalimat.' join person on person.id = student.id';
            // $student = DB::select(DB::raw($query1));

            // $query1 = $pecah[0].' '.$pecah[1].' '.$pecah[2].' '.$pecah[3].' '.'join person on person.id = student.id and student.id = '.$id.'::int8';$

            $student = DB::table('student')
            ->join('person','person.id','=','student.id')
            ->select('person.*','student.*')
            ->where('person.id','=',$pecah[6])
            ->get();
            return view('query1',compact('student'));

            // dd($student);
        //     $student = DB::select(DB::raw($query1));
        // dd($student);
       }
       elseif ($pecah[3]=='person' && count($pecah) <=4) {

        $ins = DB::table('person')
        ->select('person.name')
        ->join('instructor','person.id','=','instructor.id')
        ->join('hasi','instructor.id','=','hasi.id')
        ->join('course','hasi.desig','=','course.desig')
        ->join('tutorial','tutorial.desig','=','course.desig')
        ->join('lab','hasi.desig','=','lab.desig')
        ->groupBy('person.name')
        ->Having(DB::raw('count(lab.section)'), '>', 1)
        ->distinct('person.name')
        ->get();
        dd($ins);
        //     $query2 = $kalimat;
        //     $student = DB::select(DB::raw($query2));
        // dd($student);
       
        }
       elseif ($pecah[3]=='person') {

        $ins = DB::table('person')
        ->select('person.name')
        ->join('instructor','person.id','=','instructor.id')
        ->join('hasi','instructor.id','=','hasi.id')
        ->join('course','hasi.desig','=','course.desig')
        ->join('tutorial','tutorial.desig','=','course.desig')
        ->join('lab','hasi.desig','=','lab.desig')
        ->groupBy('person.name')
        ->Having(DB::raw('count(lab.section)'), '<=', 1)
        ->distinct('person.name')
        ->get();
        dd($ins);
        //     $query2 = $kalimat;
        //     $student = DB::select(DB::raw($query2));
        // dd($student);
       
        }
        elseif ($pecah[3]=='course' && count($pecah) <= 4 ){

            $des = DB::table('course')
            ->join('tutorial','course.desig','=','tutorial.desig')
            ->select('course.*','tutorial.*')
            ->distinct('tutorial.*','course.*')
            ->get();
            dd($des);

        }elseif ($pecah[3]=='course') {
        
            $q5 = DB::table('course')
            ->select('lab.desig','course.title')
            ->join('lab','course.desig','=','lab.desig')
            ->groupBy('lab.desig','course.title')
            ->Having(DB::raw('count(lab.section)'), '>', 1)
            ->distinct('lab.desig')
            ->get();
            dd($q5);
        //     $course = DB::select(DB::raw($kalimat));
        // dd($course);
       
        }elseif ($pecah[3]=='instructor'){
           $ins = DB::select(DB::raw($kalimat));
           dd($ins);
       }else if($pecah[3]=='lab'){
           $lab = DB::select(DB::raw($kalimat));
           dd($lab);
       }else if($pecah[3]=='tutorial'){
           $tuto = DB::select(DB::raw($kalimat));
           dd($tuto);
       }else if($pecah[3]=='hasla'){
           $hasla = DB::select(DB::raw($kalimat));
           dd($hasla);
       }
       else if($pecah[3]=='hasta'){
           $hasta = DB::select(DB::raw($kalimat));
           dd($hasta);
       }
       else if($pecah[3]=='la'){
           $la = DB::select(DB::raw($kalimat));
           dd($la);
       }
       else if($pecah[3]=='ta'){
           $ta = DB::select(DB::raw($kalimat));
           dd($ta);
       }
       else if($pecah[3]=='staff'){
           $staff = DB::select(DB::raw($kalimat));
           dd($staff);
       }
       else if($pecah[3]=='l2'){
           $l2 = DB::select(DB::raw($kalimat));
           dd($l2);
       }
       else if($pecah[3]=='l1'){
           $l1 = DB::select(DB::raw($kalimat));
           dd($l1);
       }
       else if($pecah[3]=='l3'){
           $l3 = DB::select(DB::raw($kalimat));
           dd($l3);
       }
       else if($pecah[3]=='l4'){
           $l4 = DB::select(DB::raw($kalimat));
           dd($l4);
       }
       else if($pecah[3]=='y1course'){
           $y1course = DB::select(DB::raw($kalimat));
           dd($y1course);
       }
       else if($pecah[3]=='y2course'){
           $y2course = DB::select(DB::raw($kalimat));
           dd($y2course);
       }
       else if($pecah[3]=='y3course'){
           $y3course = DB::select(DB::raw($kalimat));
           dd($y3course);
       }
       else if($pecah[3]=='y4course'){
           $y4course = DB::select(DB::raw($kalimat));
           dd($y4course);
       }
       else if($pecah[3]=='hasi'){
           $hasi = DB::select(DB::raw($kalimat));
           dd($hasi);
       }
       else if($pecah[3]=='prereq11'){
           $prereq11 = DB::select(DB::raw($kalimat));
           dd($prereq11);
       }
       else if($pecah[3]=='prereq12'){
           $prereq12 = DB::select(DB::raw($kalimat));
           dd($prereq12);
       }
       else if($pecah[3]=='prereq13'){
           $prereq13 = DB::select(DB::raw($kalimat));
           dd($prereq13);
       }
       else if($pecah[3]=='prereq14'){
           $prereq14 = DB::select(DB::raw($kalimat));
           dd($prereq14);
       }
       else if($pecah[3]=='prereq22'){
           $prereq22 = DB::select(DB::raw($kalimat));
           dd($prereq22);
       }
       else if($pecah[3]=='prereq23'){
           $prereq23 = DB::select(DB::raw($kalimat));
           dd($prereq23);
       }
       else if($pecah[3]=='prereq24'){
           $prereq24 = DB::select(DB::raw($kalimat));
           dd($prereq24);
       }
       else if($pecah[3]=='prereq33'){
           $prereq33 = DB::select(DB::raw($kalimat));
           dd($prereq33);
       }
       else if($pecah[3]=='prereq34'){
           $prereq34 = DB::select(DB::raw($kalimat));
           dd($prereq34);
       }
       else if($pecah[3]=='prereq44'){
           $prereq44 = DB::select(DB::raw($kalimat));
           dd($prereq44);
       }
       else if($pecah[3]=='antireq1'){
           $antireq1 = DB::select(DB::raw($kalimat));
           dd($antireq1);
       }
       else if($pecah[3]=='antireq2'){
           $antireq2 = DB::select(DB::raw($kalimat));
           dd($antireq2);
       }
       else if($pecah[3]=='antireq3'){
           $antireq3 = DB::select(DB::raw($kalimat));
           dd($antireq3);
       }
       else if($pecah[3]=='antireq4'){
           $antireq4 = DB::select(DB::raw($kalimat));
           dd($antireq4);
       }
       else{
            return redirect('/')->with('error', 'Salah Dalam Penulisan Query !!!');
       }
    //    dd($student);
            // $student = DB::table('student')
            // ->join('person','person.id','=','student.id')
            // ->select('person.*','student.*')
            // ->where('person.id','=',$request->student)
            // ->get();
// dd($student);
            // return view('query1',compact('student'));
    }

    public function query1b($id){
        $student = DB::table('student')
        ->join('person','person.id','=','student.id')
        ->select('person.*','student.*')
        ->get();

        $l1 = DB::table('person')
        ->join('student','student.id','=','person.id')
        ->join('l1','l1.id', '=','student.id')
        ->join('y1course','y1course.desig', '=','l1.desig')
        ->join('course','course.desig', '=','l1.desig')
        ->select('person.*','course.title','student.year','l1.status')->where('person.id','=', $id)->get();
        // dd(l1);
        $l2 = DB::table('person')
        ->join('student','student.id','=','person.id')
        ->join('l2','l2.id', '=','student.id')
        ->join('y2course','y2course.desig', '=','l2.desig')
        ->join('course','course.desig', '=','l2.desig')
        ->select('person.*','course.title','student.year','l2.status')->where('person.id','=', $id)->get();

        $l3 = DB::table('person')
        ->join('student','student.id','=','person.id')
        ->join('l3','l3.id', '=','student.id')
        ->join('y3course','y3course.desig', '=','l3.desig')
        ->join('course','course.desig', '=','l3.desig')
        ->select('person.*','course.title','student.year','l3.status')->where('person.id','=', $id)->get();

        $l4 = DB::table('person')
        ->join('student','student.id','=','person.id')
        ->join('l4','l4.id', '=','student.id')
        ->join('y4course','y4course.desig', '=','l4.desig')
        ->join('course','course.desig', '=','l4.desig')
        ->select('person.*','course.title','student.year','l4.status')->where('person.id','=', $id)->get();

        return view('query1b',compact('l1','l2','l3','l4'));
    }

    public function query2(){
        $hsil = DB::table('l1')->join('person','person.id','=','l1.id')->select('*')->get();

        return view('query2',compact('hsil'));

    }

    public function query3(){

        $p = DB::table('hasi')->select('*')
        ->join('person','person.id','=','hasi.id')
        ->join('course','course.desig','=','hasi.desig')
        ->join('y1course','y1course.desig','=','hasi.desig')
        ->get();

        return view('query3',compact('p'));
    }

    public function query4(){
        //
        $des = DB::table('course')
        ->join('tutorial','course.desig','=','tutorial.desig')
        ->select('course.*','tutorial.*')
        ->distinct('tutorial.*','course.*')
        ->get();
        return view('query4',compact('des'));
    }

    public function query5(){

        $q5 = DB::table('course')
        ->select('lab.desig','course.title')
        ->join('lab','course.desig','=','lab.desig')
        ->groupBy('lab.desig','course.title')
        ->Having(DB::raw('count(lab.section)'), '>', 1)
        ->distinct('lab.desig')
    ->get();
    // dd($q5);
    return view('query5',compact('q5'));
    }

    public function query6(){

        $ins = DB::table('person')
        ->select('person.name')
        ->join('instructor','person.id','=','instructor.id')
        ->join('hasi','instructor.id','=','hasi.id')
        ->join('course','hasi.desig','=','course.desig')
        ->join('tutorial','tutorial.desig','=','course.desig')
        ->join('lab','hasi.desig','=','lab.desig')
        ->groupBy('person.name')
        ->Having(DB::raw('count(lab.section)'), '>', 1)
        ->distinct('person.name')
        ->get();

        return view('query6',compact('ins'));
        //
    }

    public function query7(){
        $ins = DB::table('person')
        ->select('person.name')
        ->join('instructor','person.id','=','instructor.id')
        ->join('hasi','instructor.id','=','hasi.id')
        ->join('course','hasi.desig','=','course.desig')
        ->join('tutorial','tutorial.desig','=','course.desig')
        ->join('lab','hasi.desig','=','lab.desig')
        ->groupBy('person.name')
        ->Having(DB::raw('count(lab.section)'), '<=', 1)
        ->distinct('person.name')
        ->get();

        return view('query7',compact('ins'));
    }

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
