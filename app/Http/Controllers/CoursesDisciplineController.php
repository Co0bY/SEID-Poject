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

    public function addform($id){
        $course = Course::where('id', $id)->first();
        $disciplines = Discipline::get();
        return view('secretary.courses.add_discipline', ['course' => $course, 'disciplines' => $disciplines]);
    }

    public function add(Request $request){
        $addDiscipline = new CoursesDiscipline;
        $addDiscipline->course_id = $request->id;
        $addDiscipline->discipline_id = $request->discipline_id;
        $addDiscipline->save();

        return redirect()->route('secretary.course-details', $request->id);
    }

    public function remove($disciplineid, $courseid){
        $coursediscipline = CoursesDiscipline::where('course_id', $courseid)
        ->where('discipline_id', $disciplineid)->delete();

        return redirect()->route('secretary.course-details', $courseid);
    }
}
