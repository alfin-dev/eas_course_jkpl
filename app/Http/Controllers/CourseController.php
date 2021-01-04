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
       //
        $query = strtolower($request->querycoba);
        $pecah = explode(" ", $query);
        if ($pecah[1] == "all") {
        // $pecah = explode(" ", $query);
        $pecah[1] = "*"; // tulisan All diganti *
        $kalimat = implode(" ",$pecah);

            // $query1 = $kalimat;
            // $student = DB::select(DB::raw($query1));
            // dd($student);

        // dd($pecah);

        if($pecah[3]=='student' && count($pecah) <= 4 ){
            $query = strtolower($request->querycoba);
            $query1 = $kalimat.' join person on person.id = student.id';
            $ins = DB::select(DB::raw($query1));
            // dd($student);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }elseif($pecah[3]=='student'){
            // $id = strval($pecah[6]);
            // dd($id);
            // select * from student join person on person.id = student.id and student.id = '0000041'
            // $query1 = $kalimat.' join person on person.id = student.id';
            // $student = DB::select(DB::raw($query1));

            // $query1 = $pecah[0].' '.$pecah[1].' '.$pecah[2].' '.$pecah[3].' '.'join person on person.id = student.id and student.id = '.$id.'::int8';$
            $query = strtolower($request->querycoba);
            $ins = DB::table('student')
            ->join('person','person.id','=','student.id')
            ->select('person.*','student.*')
            ->where('person.id','=',$pecah[6])
            ->get();
            // return view('query1',compact('student'));
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
            // dd($student);
        //     $student = DB::select(DB::raw($query1));
        // dd($student);
       }
       elseif ($pecah[3]=='person' && count($pecah) <=4) {
        $query = strtolower($request->querycoba);
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
        // dd($ins);
        $stud = DB::table('student')->count();
        $staf = DB::table('staff')->count();
        $cour = DB::table('course')->count();
        $inst = DB::table('instructor')->count();
        return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        //     $query2 = $kalimat;
        //     $student = DB::select(DB::raw($query2));
        // dd($student);

        }
       elseif ($pecah[3]=='person') {
        $query = strtolower($request->querycoba);
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
        // dd($ins);
        //     $query2 = $kalimat;
        //     $student = DB::select(DB::raw($query2));
        // dd($student);

        }
        elseif ($pecah[3]=='course' && count($pecah) <= 4 ){
            $query = strtolower($request->querycoba);
            $ins = DB::table('course')
            ->join('tutorial','course.desig','=','tutorial.desig')
            ->select('course.*','tutorial.*')
            ->distinct('tutorial.*','course.*')
            ->get();
            // dd($des);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));

        }elseif ($pecah[3]=='course') {
            $query = strtolower($request->querycoba);
            $ins = DB::table('course')
            ->select('lab.desig','course.title')
            ->join('lab','course.desig','=','lab.desig')
            ->groupBy('lab.desig','course.title')
            ->Having(DB::raw('count(lab.section)'), '>', 1)
            ->distinct('lab.desig')
            ->get();
            // dd($q5);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
        //     $course = DB::select(DB::raw($kalimat));
        // dd($course);

        }elseif ($pecah[3]=='instructor'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($ins);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }else if($pecah[3]=='lab'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($lab);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }else if($pecah[3]=='tutorial'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($tuto);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }else if($pecah[3]=='hasla'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($hasla);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='hasta'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($hasta);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='la'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($la);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='ta'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($ta);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='staff'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($staff);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l2'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($l2);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l1'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($l1);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l3'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($l3);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='l4'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($l4);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y1course'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($y1course);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y2course'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
        //    dd($y2course);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y3course'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($y3course);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='y4course'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($y4course);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='hasi'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($hasi);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq11'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq11);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq12'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq12);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq13'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq13);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq14'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq14);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq22'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq22);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq23'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq23);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq24'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq24);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq33'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            //    dd($prereq33);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq34'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq34);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='prereq44'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($prereq44);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq1'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($antireq1);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq2'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($antireq2);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq3'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($antireq3);
            $stud = DB::table('student')->count();
            $staf = DB::table('staff')->count();
            $cour = DB::table('course')->count();
            $inst = DB::table('instructor')->count();
            return view('dashboard',compact('stud','staf','cour','inst','ins','query'));
       }
       else if($pecah[3]=='antireq4'){
            $query = strtolower($request->querycoba);
            $ins = DB::select(DB::raw($kalimat));
            // dd($antireq4);
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
