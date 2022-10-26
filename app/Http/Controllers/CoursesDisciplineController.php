<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesDiscipline;
use App\Models\Discipline;
use Illuminate\Http\Request;

class CoursesDisciplineController extends Controller
{
    public function index(){

    }

    public function add(Request $request){
        $course_id = Course::select('id')->where('code', $request->code)->first();
        $discipline_id = Discipline::select('id')->where('code', $request->code)->first();
        $addDiscipline = new CoursesDiscipline;
        $addDiscipline->course_id = $course_id;
        $addDiscipline->discipline_id = $discipline_id;
        $addDiscipline->save();

        return redirect()->route('secretary.course-index');
    }

    public function remove($id){
        $removeDiscipline = CoursesDiscipline::where('id', $id)->first();
        $removeDiscipline->delete();

        return redirect()->route('secretary.course-index');
    }
}
