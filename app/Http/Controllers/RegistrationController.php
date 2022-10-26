<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Season;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        $registrations = Registration::get();

        return view('secretary.Registrations.index', ['registrations' => $registrations]);
    }

    public function createform(){
        return view('secretary.Registrations.registration_create');
    }
    public function create(Request $request){
        $student = Student::where('cpf',$request['cpf'])->first();
        $season = Season::where('code', $request['code'])->first();


        $registration = new Registration;

        $matricula = substr($request['name'], 0, 4) . substr($request['cpf'], 0, 4) . substr($request['code'], 0, 4);
        $registration->student_id = $student->id;
        $registration->season_id = $season->id;
        $registration->registration = $matricula;
        $registration->active = true;
        $registration->save();

        $course_id = Course::select('id')->where('code', $request->course_code)->first();
        $registration_id = Registration::select('id')->orderByDesc('id')->first();

        $studentInCourse = new StudentsInCourse();
        $studentInCourse->course_id = $course_id;
        $studentInCourse->registration_id = $registration_id;
        $studentInCourse->save();

        return redirect()->route('secretary.registration-index');
    }

    public function show(Request $request){
        $registration = Registration::where('id', $request['id'])->first();

        return view('', ['registration' => $registration]);
    }

    public function update(Request $request){
        $registration = Registration::where('id', $request['id'])->first();
        $student = Student::where('cpf',$request['cpf'])->first();
        $season = Season::where('code', $request['code'])->first();
        $matricula = $request['registration'];
        $registration->student_id = $student->id;
        $registration->season_id = $season->id;
        $registration->registration = $matricula;
        $registration->active = true;
        $registration->save();

    }

    public function delete(){

    }
}
