<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::get();

        return view('secretary.courses.index', ['courses' => $courses]);
    }

    public function createform(){
        return view('secretary.courses.course_create');
    }

    public function create(Request $request){
        $course = new Course();
        $course->name = $request['course_name'];
        $course->type_of_course = $request['type_of_course'];
        $course->duration_in_years = $request['duration_in_years'];;
        $course->save();
        $courses = Course::get();
        return view('secretary.courses.index', ['courses' => $courses]);
    }

    public function show($id){
        $course = Course::where('id',$id)->first();


        return view('secretary.courses.course_update', ['course' => $course]);
    }

    public function update(Request $request){

        $course = Course::where('id', $request['id'])->first();
        $course->name = $request['course_name'];
        $course->code = $request['code'];
        $course->duration_in_years = $request['duration_in_years'];;
        $course->save();

        return redirect()->route('secretary.course-index');
    }

    public function delete(){

    }
}
