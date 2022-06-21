<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        // $class= DB::table('classes')->orderBy('class_name', 'ASC')->get(); 
        // $class= DB::table('classes')->paginate(2); 
        // $class= DB::table('classes')->simplePaginate(2); 
        
        $class= DB::table('classes')->paginate(2);

        // dd($class);
        return view('admin.class.index', compact('class'));

    }
    // create 
    function createController(){
        return view('admin.class.create');
    }
    function storeController(Request $req){
        $req->validate([
            'class_name'=>'required|unique:classes',
        ]);
        $date=array(
            'class_name'=>$req->class_name,
        );
        DB::table('classes')->insert($date);
        return redirect()->back()->with('success','successfull insert');
    }

    function delete($id){
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->back()->with('success','successfully delete');
    }

    function editController($id){
        DB::table('classes')->where('id', $id)->first();
        return view('admin.class.edit');
    }

    function updateController(Request $req, $id){
        $req->validate([
            'class_name'=>'required',
        ]);

        $date=array(
            'class_name'=>$req->class_name,
        );
        DB::table('classes')->where('id', $id)->update($date);
        return redirect()->back()->with('success','successfull insert');
    }
    
}

