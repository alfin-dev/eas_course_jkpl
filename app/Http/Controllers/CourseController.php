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
        $ins = null;
        $query = null;
        $stud = DB::table('student')->count();
        $staf = DB::table('staff')->count();
        $cour = DB::table('course')->count();
        $inst = DB::table('instructor')->count();
        return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function query1(Request $request){
        $query = strtolower($request->querycoba);
        $pecah = explode(" ", $query);
        if ($pecah[1] == "all") {
        $pecah[1] = "*";
        $kalimat = implode(" ",$pecah);

        if($pecah[3]=='student' && count($pecah) <= 4 ){
            $query1 = $kalimat.' join person on person.id = student.id';
            $ins = DB::select(DB::raw($query1));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
         elseif ($pecah[3]=='student' && $pecah[5] == 'year1'){
            $ins = DB::table('l1')->join('person','person.id','=','l1.id')->select('*')->get();
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }elseif($pecah[3]=='student'){
            $ins = DB::table('student')
            ->join('person','person.id','=','student.id')
            ->select('person.*','student.*')
            ->where('person.id','=',$pecah[6])
            ->get();

            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       elseif ($pecah[3]=='person' && count($pecah) <=4) {
        $ins = DB::table('person')
        ->select('person.name')
        // ->join('instructor','person.id','=','instructor.id')
        // ->join('hasi','instructor.id','=','hasi.id')
        // ->join('course','hasi.desig','=','course.desig')
        // ->join('tutorial','tutorial.desig','=','course.desig')
        // ->join('lab','hasi.desig','=','lab.desig')
        // ->groupBy('person.name')
        // ->Having(DB::raw('count(lab.section)'), '>', 1)
        // ->distinct('person.name')
        ->get();
        $stud = DB::table('student')->count();
        $staf = DB::table('staff')->count();
        $cour = DB::table('course')->count();
        $inst = DB::table('instructor')->count();
        return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
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
        $stud = DB::table('student')->count();
        $staf = DB::table('staff')->count();
        $cour = DB::table('course')->count();
        $inst = DB::table('instructor')->count();
        return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        elseif ($pecah[3]=='course' && count($pecah) <= 4 ){
            $ins = DB::table('course')
            ->join('tutorial','course.desig','=','tutorial.desig')
            ->select('course.*','tutorial.*')
            ->distinct('tutorial.*','course.*')
            ->get();
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));

        }elseif ($pecah[3]=='course' && $pecah[6] =='tutorial') {
        $ins = DB::table('course')
        ->join('tutorial','course.desig','=','tutorial.desig')
        ->select('course.*','tutorial.*')
        ->distinct('tutorial.*','course.*')
        ->get();
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        elseif ($pecah[3]=='course' && $pecah[6] =='lab') {
            $ins = DB::table('course')
            ->select('lab.desig','course.title')
            ->join('lab','course.desig','=','lab.desig')
            ->groupBy('lab.desig','course.title')
            ->Having(DB::raw('count(lab.section)'), '>', 1)
            ->distinct('lab.desig')
            ->get();

            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        elseif ($pecah[3]=='instructor' && count($pecah) <= 4){
            $ins = DB::select(DB::raw($kalimat.' join person on person.id = instructor.id'));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
        elseif ($pecah[3]=='instructor' && $pecah[5] == 'year1') {
            $ins = DB::table('hasi')->select('*')
            ->join('person','person.id','=','hasi.id')
            ->join('course','course.desig','=','hasi.desig')
            ->join('y1course','y1course.desig','=','hasi.desig')
            ->get();
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        elseif ($pecah[3]=='instructor' && $pecah[5] == 'teach') {
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
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        elseif ($pecah[3]=='instructor' && $pecah[8] == 'single') {
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
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        }
        else if($pecah[3]=='lab'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }else if($pecah[3]=='tutorial'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }else if($pecah[3]=='hasla'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='hasta'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='la'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='ta'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='staff'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l2'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l1'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l3'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l4'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y1course'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y2course'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y3course'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y4course'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='hasi'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq11'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq12'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq13'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq14'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq22'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq23'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq24'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq33'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq34'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq44'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq1'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq2'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq3'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq4'){
            $ins = DB::select(DB::raw($kalimat));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else{
            return redirect('/')->with('error', 'Salah Dalam Penulisan Query !!!');
       }
    }else {
            return redirect('/')->with('error', 'Salah Dalam Penulisan Query !!!');

    }
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
