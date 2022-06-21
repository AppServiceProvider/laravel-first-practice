<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $students = DB::table('students')->orderBy('roll', 'ASC')->get();
        $students=DB::table('students')->join('classes', 'class_id', 'classes.id')->get(); 
        // dd($students);
        return view('admin.students.index', compact('students')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes=DB::table('classes')->get();
        return view ('admin.students.create', compact('classes')); 

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
        // dd($request->all());
        $request->validate([
            'class_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'roll'=>'required',

        ]);
        $date=array(
            'class_id'=>$request->class_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'roll'=>$request->roll,
        );
        DB::table('students')->insert($date);
        return redirect()->back()->with('success', 'SUCCESSFULL insert');
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
        $students=DB::table('students')->where('id', $id)->first();
        return response()->json($students);
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
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'SUCCESSFULL DELETED');

    }
}
