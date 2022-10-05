<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\TeacherInClasses;
use App\Models\RegistrationsInClasses;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Attendance;
use App\Models\Score;
use App\Models\HomeWork;
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
            $classes = Classes::where('id', $ligation->id_class)->get();
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
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.score', ['classes' => $classes]);
    }

    public function listStudentsAttendance($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $classid = $id;
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        }
        return view('teachers.attendance_form', ['students' => $students, 'classid' => $classid]);
    }

    public function makeAttendance(Request $request){
        // dd($request);
        $t = count($request['name']);
        for($i = 0; $i < $t; $i++){
            $registrationInClass = RegistrationsInClasses::where('id_registration', $request['id'][$i])->where('id_class', $request['classid'])->first();
            $attendance = new Attendance;
            $attendance->registration_in_class_id = $registrationInClass->id;
            $attendance->attendance = $request['attendance'][$i];
            // dd($attendance);
            $attendance->save();
        }
        return redirect()->route('teacher.attendance');
    }

    public function listStudentsScore($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $classid = $id;
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        }
        return view('teachers.score_form', ['students' => $students, 'classid' => $classid]);
    }

    public function makeScore(Request $request){
        // dd($request);
        $t = count($request['name']);
        for($i = 0; $i < $t; $i++){
            if(isset($request['score'][$i]))
            $registrationInClass = RegistrationsInClasses::where('id_registration', $request['id'][$i])->where('id_class', $request['classid'])->first();
            $attendance = new Score;
            $attendance->registration_in_class_id = $registrationInClass->id;
            $attendance->score = $request['score'][$i];
            // dd($attendance);
            $attendance->save();
        }
        return redirect()->route('teacher.score');
    }

    public function listStudentsScoreEdit($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $classid = $id;
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        }
        return view('teachers.score_edit', ['students' => $students, 'classid' => $classid]);
    }

    public function editStudentScore($id, $classid){

        $registration = Registration::where('id', $id)->first();
        $classregistration = RegistrationsInClasses::where('id_class', $classid)->where('id_registration', $id)->first();
        $studentfocus = Student::where('id', $registration->student_id)->first();
        $scores = Score::where('registration_in_class_id', $classregistration->id)->get();
        $student = $registration;
        $student->name = $studentfocus->name;

        return view('teachers.score_edit_form', ['student' => $student, 'scores' => $scores, 'classid' => $classid]);
    }

    public function updateStudentScore(Request $request){

        $t = count($request['id']);
        for($i = 0; $i < $t; $i++){
            $newscore = Score::where('id', $request['id'][$i])->first();
            $newscore->score = $request['score'][$i];
            $newscore->save();
        }
        return redirect()->route('teacher.score');
    }

    public function listClassesHomework(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.homework_index', ['classes' => $classes]);
    }
    public function assignedHomeworkForm($id){

        return view('teachers.homework_assignment_form',['classid' => $id]);
    }

    public function createHomework(Request $request){
        // dd($request);
        $homework = new Homework;
        $homework->class_id = $request->classid;
        $homework->title = $request->title;
        $homework->content = $request->content;
        $path = $request->file('additional_file')->store('public/additional_files');
        $homework->additional_file = $path;
        if($request->score){
            $homework->score = $request->score;
        }
        $homework->save();
    }
}
