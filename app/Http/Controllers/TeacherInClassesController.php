<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\TeacherInClasses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherInClassesController extends Controller
{
    public function addform(){
        return view('secretary.schoolclass.add_teacher');
    }

    public function addTeacher(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'cpf.exists' => 'O cpf informado não existe na base*',
            'code.exists' => 'O código da turma informado não existe na base*',
        ];
        $rules = [
            'cpf' => ['required', Rule::exists('teachers', 'cpf')],
            'code' => ['required', Rule::exists('classes', 'code')],
        ];
        $request->validate($rules, $descriptions);
        $teacher = Teacher::where('cpf', $request['cpf'])->first();
        $class = Classes::where('code', $request['code'])->first();
        $registration = new TeacherInClasses;
        $registration->id_teacher = $teacher->id;
        $registration->id_class = $class->id;
        $registration->save();

        $classes = Classes::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }
}
