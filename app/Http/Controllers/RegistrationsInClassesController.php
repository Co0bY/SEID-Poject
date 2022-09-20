<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationsInClassesController extends Controller
{
    public function addform(){
        return view('secretary.active.assigning_registration');
    }

    public function addStudent(Request $request){
        $matricula = Registration::where('registration', $request['registration'])->first();
        $class = Classes::where('code', $request['code_active']);
        $registration = new RegistrationsInClasses;
        $registration->id_student = $matricula->id;
        $registration->id_class = $class->id;
        $registration->save();

        $disciplines = ActiveDiscpline::get();

        return view('secretary.active.index', ['disciplines' => $disciplines]);
    }

    public function removeStudent($id){
        $registration = RegistrationsInActiveDiscipline::where('id', $id)->first();
        $registration->delete();

        return view('');
    }
    public function show(){

    }
    public function edit(){

    }
}
