<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesDiscipline;
use App\Models\Discipline;
use App\Models\Registration;
use App\Models\Student;
use App\Models\StudentRegistrationInSubject;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class StudentInCourseController extends Controller
{
    public function list($id, $msg){
        $students = StudentsInCourse::where('course_id', $id)->get();
        $registrations = [];
        $i = 0;
        if(count($students) > 0){

            foreach($students as $student){
                $registration = Registration::where('id', $student->registration_id)->first();


                $student = Student::where('id', $registration->student_id)->first();

                $registrations[$i] = $registration;
                $registrations[$i]->name = $student->name;
                $i++;
            }
        }

        if(empty($msg)){
            $msg = "";
        }

        return view('secretary.courses.certifed_index', ['registrations' => $registrations, 'msg' => $msg]);
    }

    public function createPDF($id){
        $student = StudentsInCourse::where('registration_id', $id)->where('active',1)->first();
        if(!isset($student->certified)){
            $registros = StudentRegistrationInSubject::where('students_in_courses_id', $student->id)->get();
            if(count($registros) > 0){
                foreach($registros as $registro){
                    if($registro->score >= 6 && $registro->attendance_frequency > 0.74 ){

                    }else{
                        $students = StudentsInCourse::where('course_id', $student->course_id)->get();
                        $registrations = [];
                        $i = 0;
                        if(count($students) > 0){

                            foreach($students as $student){
                                $registration = Registration::where('id', $student->registration_id)->first();
                                $student = Student::where('id', $registration->student_id)->first();

                                $registrations[$i] = $registration;
                                $registrations[$i]->name = $student->name;
                                $i++;
                            }

                            $courseDiscipline = CoursesDiscipline::where('id', $registro->courses_disciplines_id)->first();
                            $discipline = Discipline::where('id', $courseDiscipline->discipline_id)->first();
                            $msg = "O aluno não conseguiu os requisitos necessários para se ter um certificado, possivelmente sendo os requisitos na disciplina: $discipline->name tendo a nota como $registro->score e a frequência de $registro->attendance_frequency , onde se precisa de uma nota acima de 6 e uma frequência acima de 0,74 para passar";
                        }

                    return view('secretary.courses.certifed_index', ['registrations' => $registrations, 'msg' => $msg]);
                    }
                }
            }
            $studentRegistration = Registration::with('student')->where('id', $id)->first();
            $course = Course::where('id', $student->course_id)->first();
            $pdf = Pdf::loadView('certificado',['registration' => $studentRegistration, 'course' => $course])->setPaper('a4', 'landscape');
            $content = $pdf->download()->getOriginalContent();
            $name = $studentRegistration->student->name . "_Certificado";
            Storage::put("public/certifieds/$name.pdf",$content) ;
            $student->certified = Storage::url("public/certifieds/$name.pdf");
            $student->save();

            $msg = "<p>Certificado gerado, acesse:<a href='$student->certified' class=' btn btn-dark nav-link link-dark'> Certificado</a></p>";

            $students = StudentsInCourse::where('course_id', $student->course_id)->get();
            $registrations = [];
            $i = 0;
            if(count($students) > 0){

                foreach($students as $student){
                    $registration = Registration::where('id', $student->registration_id)->first();
                    $student = Student::where('id', $registration->student_id)->first();

                    $registrations[$i] = $registration;
                    $registrations[$i]->name = $student->name;
                    $i++;
                }
            }

            return view('secretary.courses.certifed_index', ['registrations' => $registrations, 'msg' => $msg]);
        }else{
            $msg = "<p>O estudante já tem um certificado, acesse:<a href='$student->certified' class=' btn btn-dark nav-link link-dark'> Certificado</a></p>";

            $students = StudentsInCourse::where('course_id', $student->course_id)->get();
            $registrations = [];
            $i = 0;
            if(count($students) > 0){

                foreach($students as $student){
                    $registration = Registration::where('id', $student->registration_id)->first();
                    $student = Student::where('id', $registration->student_id)->first();

                    $registrations[$i] = $registration;
                    $registrations[$i]->name = $student->name;
                    $i++;
                }
            }

            return view('secretary.courses.certifed_index', ['registrations' => $registrations, 'msg' => $msg]);
        }
    }
}
