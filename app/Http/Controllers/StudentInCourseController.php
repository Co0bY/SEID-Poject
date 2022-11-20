<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Student;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;

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
}
