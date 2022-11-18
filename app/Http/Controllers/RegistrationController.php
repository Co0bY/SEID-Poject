<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Season;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function index(){
        $registrations = Registration::with('student')->with('season')->get();

        return view('secretary.Registrations.index', ['registrations' => $registrations]);
    }

    public function createform(){
        return view('secretary.Registrations.registration_create');
    }
    public function create(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'cpf.exists' => 'O cpf informado não existe na base*',
            'code.exists' => 'O codigo informado não existe na base*',
            'course_code.exists' => 'O codigo informado não existe na base*'
        ];
        $rules = [
            'cpf' => ['required', Rule::exists('students', 'cpf')],
            'code' => ['required', Rule::exists('seasons', 'code')],
            'course_code' => ['required', Rule::exists('courses', 'code')],
        ];
        $request->validate($rules, $descriptions);

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
        $studentInCourse->course_id = $course_id->id;
        $studentInCourse->registration_id = $registration_id->id;
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

    public function filtro(Request $request){
        $registration = $request->registration;
        $student_name = $request->student_name;
        $cpf = $request->cpf;
        $code = $request->code;

        $query = Registration::query();

        if($registration != ""){
           $query->where('registration', 'like', "%$registration%");
        }
        if($cpf != ""){
            $student = Student::where('cpf', 'like', "%$cpf%")->first();
            if(isset($student)){
                $query->where('student_id', $student->id);
            }else{
                $query->where('student_id', '');
            }
        }
        if($student_name != ""){
            $student = Student::where('name', 'like', "%$student_name%")->first();
            if(isset($student)){
                $query->where('student_id', $student->id);
            }else{
                $query->where('student_id', '');
            }
        }
        if($code != ""){
            $season = Season::where('code','like', $code)->first();
            if(isset($season)){
                $query->where('season_id', 'like', $season->id);
            }else{
                $query->where('season_id', '');
            }

        }

        $registrations = $query->with('student')->with('season')->orderByDesc('id')->paginate(10);

        return view('secretary.Registrations.index', ['registrations' => $registrations]);
    }
}
