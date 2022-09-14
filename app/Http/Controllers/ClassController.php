<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        $classes = SchoolClass::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }

    public function createform(){
        return view('secretary.schoolclass.class_create');
    }

    public function create(Request $request){


        $class = new SchoolClass;
        $class->name = $request['name'];
        $class->code = $request['code'];
        $class->save();

        $classes = SchoolClass::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }

    public function show(Request $request){
        $class = SchoolClass::where('id', $request['id'])->first();

        return view('', ['class' => $class]);
    }

    public function update(){
        $class = SchoolClass::where('id', $request['id'])->first();
        $class->name = $request['name'];
        $class->save();

    }

    public function delete(){

    }
}
