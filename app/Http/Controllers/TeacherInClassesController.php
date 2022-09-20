<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherInClassesController extends Controller
{
    public function addform(){
        return view('secretary.schoolclass.add_teacher');
    }

    public function addTeacher(Request $request){
        $teacher = Teacher::where('cpf', $request['cpf'])->first();
        $class = Classes::where('code', $request['code'])->first();
        $registration = new RegistrationsInClasses;
        $registration->id_teacher = $teacher->id;
        $registration->id_class = $class->id;
        $registration->save();

        $classes = Classes::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }
}
