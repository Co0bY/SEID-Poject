<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\TeacherInClasses;
use App\Models\RegistrationInClasses;
use App\Models\Student;
use App\Models\Registration;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.index', ['classes' => $classes]);
    }

    public function listClassesAttendance(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->first();
        }
        else{
            $classes = [];
        }

        return view('teachers.attendance', ['classes' => $classes]);
    }

    public function listClassesScore(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->first();
        }
        else{
            $classes = [];
        }

        return view('teachers.score', ['classes' => $classes]);
    }

    public function listStudentsAttendance($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id);
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
            }
            dd($students);
        }
        return view('', ['students' => $students]);
    }

    public function listStudentsScore($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id);
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
            }
            dd($students);
        }
        return view('', ['students' => $students]);
    }
}
