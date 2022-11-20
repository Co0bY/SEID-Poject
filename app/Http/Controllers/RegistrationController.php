<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesDiscipline;
use App\Models\Student;
use App\Models\Registration;
use App\Models\RegistrationsInClasses;
use App\Models\Season;
use App\Models\StudentRegistrationInSubject;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function index(){
        $active = 1;
        $registrations = Registration::with('student')->with('season')->where('active', $active)->paginate(10);

        return view('secretary.Registrations.index', ['registrations' => $registrations, 'active' => $active]);
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

        $matricula = "$request->course_code" . substr($student->name, 0, 4) . substr($request['cpf'], 0, 4);
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

        $coursedisciplines = CoursesDiscipline::where('course_id', $course_id->id)->get();
        if(count($coursedisciplines) > 0){
            foreach($coursedisciplines as $coursediscipline){
                $studentRegistrations = new StudentRegistrationInSubject();
                $studentRegistrations->students_in_courses_id = $studentInCourse->id;
                $studentRegistrations->courses_disciplines_id = $coursediscipline->id;
                $studentRegistrations->score = 0;
                $studentRegistrations->attendance_frequency = 0;
                $studentRegistrations->save();
            }
        }

        return redirect()->route('secretary.registration-index');
    }

    public function show($id){
        $registration = Registration::where('id', $id)->with('student')->with('season')->first();
        $registrationInCourse = StudentsInCourse::where('registration_id', $registration->id)->with('course')->first();
        $registration->course_code = $registrationInCourse->course->id;
        return view('secretary.Registrations.registration_update', ['registration' => $registration]);
    }

    public function update(Request $request){
        $registration = Registration::where('id', $request['id'])->first();
        $student = Student::where('cpf',$request['cpf'])->first();
        $season = Season::where('code', $request['code'])->first();
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
        $registration->season_id = $season->id;
        $registration->active = true;
        $registration->save();

    }
    public function deleteForm($id){
        $registration = Registration::where('id', $id)->with('student')->with('season')->first();
        $registrationInCourse = StudentsInCourse::where('registration_id', $registration->id)->with('course')->first();
        $registration->course_code = $registrationInCourse->course->id;
        return view('secretary.Registrations.registration_delete', ['registration' => $registration]);
    }

    public function delete(Request $request){
        $registration = Registration::where('id', $request->id)->first();
            $registration->active = 0;
            $registration->save();
            $registrationsinclasses = RegistrationsInClasses::where('id_registration', $registration->id)->get();
            if(count($registrationsinclasses) > 0){
                foreach($registrationsinclasses as $registrationsinclasse){
                    $registrationsinclasse->active = 0;
                    $registrationsinclasse->save();
                }
            }
            $registrationincourse = StudentsInCourse::where('registration_id', $registration->id)->first();
            if(isset($registrationincourse)){
                $registrationincourse->active = 0;
                $registrationincourse->save();
            }

            return redirect()->route('secretary.registration-index');
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
        $active = 1;
        $registrations = $query->with('student')->with('season')->where('active', $active = 1)->orderByDesc('id')->paginate(10);

        return view('secretary.Registrations.index', ['registrations' => $registrations, 'active' =>$active]);
    }

    public function inactives(Request $request){
        $active = 0;
        $registrations = Registration::with('student')->with('season')->where('active', $active)->paginate(10);

        return view('secretary.Registrations.index', ['registrations' => $registrations, 'active' => $active]);
    }

    public function filtroInativos(Request $request){
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
        $active = 0;

        $registrations = $query->with('student')->with('season')->orderByDesc('id')->paginate(10);

        return view('secretary.Registrations.index', ['registrations' => $registrations, 'active' => $active]);
    }

    public function reactiveForm($id){
        $registration = Registration::where('id', $id)->with('student')->with('season')->first();
        $registrationInCourse = StudentsInCourse::where('registration_id', $registration->id)->with('course')->first();
        $registration->course_code = $registrationInCourse->course->id;
        return view('secretary.Registrations.registration_reactive', ['registration' => $registration]);
    }

    public function reactive(Request $request){
        $registration = Registration::where('id', $request->id)->first();
            $registration->active = 1;
            $registration->save();
            $registrationsinclasses = RegistrationsInClasses::where('id_registration', $registration->id)->get();
            if(count($registrationsinclasses) > 0){
                foreach($registrationsinclasses as $registrationsinclasse){
                    $registrationsinclasse->active = 1;
                    $registrationsinclasse->save();
                }
            }
            $registrationincourse = StudentsInCourse::where('registration_id', $registration->id)->first();
            if(isset($registrationincourse)){
                $registrationincourse->active = 1;
                $registrationincourse->save();
            }

            return redirect()->route('secretary.registration-index');
    }

}
