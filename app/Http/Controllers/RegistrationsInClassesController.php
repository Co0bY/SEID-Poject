<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Classes;
use App\Models\CoursesDiscipline;
use App\Models\Discipline;
use App\Models\Registration;
use App\Models\RegistrationsInClasses;
use App\Models\StudentRegistrationInSubject;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationsInClassesController extends Controller
{
    public function addform(){
        return view('secretary.schoolclass.add_student');
    }

    public function addStudent(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'registration.exists' => 'A matrícula do alino informado não existe na base*',
            'code.exists' => 'O código da turma informado não existe na base*',
        ];
        $rules = [
            'registration' => ['required', Rule::exists('registrations', 'registration')],
            'code' => ['required', Rule::exists('classes', 'code')],
        ];
        $request->validate($rules, $descriptions);
        $matricula = Registration::where('registration', $request['registration'])->first();
        $class = Classes::where('code', $request['code'])->first();
        $registration = new RegistrationsInClasses;
        $registration->id_registration = $matricula->id;
        $registration->id_class = $class->id;
        $registration->final_score = 0;
        $registration->save();

        // $registrationInCourse = StudentsInCourse::where('registration_id', $matricula->id)->first();
        // $discipline = Discipline::where('id', $class->id_discipline)->first();
        // $disciplinecourse = CoursesDiscipline::where('course_id', $registrationInCourse->course_id)->where('discipline_id', $discipline->id)->first();

        // $registros = new StudentRegistrationInSubject();
        // $registros->students_in_courses_id = $registrationInCourse->id;
        // $registros->courses_disciplines_id = $disciplinecourse->id;
        // $registros->score = 0;
        // $registros->attendance_frequency = 0;
        // $registros->save();

        return redirect()->route('secretary.class-index');
    }

    public function removeStudent($id){

    }
    public function show(){

    }
    public function edit(){

    }
}
