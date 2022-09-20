<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationsInClassesController extends Controller
{
    public function addform(){
        return view('secretary.schoolclass.add_student');
    }

    public function addStudent(Request $request){
        $matricula = Registration::where('registration', $request['registration'])->first();
        $class = Classes::where('code', $request['code'])->first();
        $registration = new RegistrationsInClasses;
        $registration->id_student = $matricula->id;
        $registration->id_class = $class->id;
        $registration->save();

        $classes = Classes::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);;
    }

    public function removeStudent($id){

    }
    public function show(){

    }
    public function edit(){

    }
}
