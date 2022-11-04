<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesDiscipline;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*'
        ];
        $rules = [
            'name' => 'required|unique:courses|max:255',
            'code' => 'required|unique:courses|max:255',
            'type_of_course' => 'required',
            'duration_in_years' => 'required',
        ];
        $request->validate($rules, $descriptions);

        $course = new Course();
        $course->name = $request->name;
        $course->type_of_course = $request->type_of_course;
        $course->duration_in_years = $request->duration_in_years;
        $course->code = $request->code;
        $course->save();
        return redirect()->route('secretary.course-index');
    }

    public function show($id){
        $course = Course::where('id',$id)->first();


        return view('secretary.courses.course_update', ['course' => $course]);
    }

    public function update(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*'
        ];
        $rules = [
            'name' => ['required', Rule::unique('courses')->ignore($request['id'])->where(fn ($query) => $query->where('name', $request['name']))],
            'code' => ['required',Rule::unique('courses')->ignore($request['id'])],
            'type_of_course' => 'required',
            'duration_in_years' => 'required',
        ];
        $request->validate($rules, $descriptions);
        $course = Course::where('id', $request['id'])->first();
        $course->name = $request['name'];
        $course->code = $request['code'];
        $course->duration_in_years = $request['duration_in_years'];;
        $course->save();

        return redirect()->route('secretary.course-details', $course->id);
    }

    public function delete(){

    }

    public function detailspage ($id){
        $course = Course::where('id', $id)->first();
        $coursesdisciplines = CoursesDiscipline::where('course_id', $id)->get();
        $disciplines = [];
        if(isset($coursesdisciplines)){
            $i = 0;
            foreach($coursesdisciplines as $coursesdiscipline){
                $disciplines[$i] = Discipline::where('id', $coursesdiscipline->discipline_id)->first();
                $i++;
            }
        }

        return view('secretary.courses.details', ['course' => $course, 'disciplines' => $disciplines]);
    }


}