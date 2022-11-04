<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Discipline;
use App\Models\LessonPlan;
use App\Models\Room;
use App\Models\Season;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id){
        $class = Classes::where('id', $id)->first();
        $season = Season::where('id', $class->id_season)->first();
        $room = Room::where('id', $class->id_room)->first();
        $discipline = Discipline::where('id', $class->id_discipline)->first();
        $class->season = $season->name;
        $class->room = $room->name;
        $class->discipline = $discipline->name;
        $lessons = LessonPlan::where('class_id', $class->id)->get();

        return view('teachers.class-plan.index', ['class' => $class, 'lessons' => $lessons]);
    }

    public function addlesson(Request $request){
        // return dd($request->all());

        $lessons = LessonPlan::where('class_id', $request->id)->get();
        // dd($lessons);
        if(count($lessons) > 0){
            // dd($lessons);
            for ($contador = $request->number_of_lesson; $contador > 0; $contador--){
                $lastlesson = LessonPlan::where('class_id', $request->id)->orderByDesc('id')->first();
                $lastnumberlesson = $lastlesson->number_of_lesson;
                $lastnumberlesson ++;
                $newlesson = new LessonPlan();
                $newlesson->number_of_lesson = $lastnumberlesson;
                $newlesson->class_id = $request->id;
                $newlesson->content = 'Aula criada pelo sistema';
                $newlesson->notes = 'Faça uma chamada para adicionar';
                $newlesson->save();
            }
        }else{
            for ($contador = 1; $contador <= $request->number_of_lesson; $contador++){
                $newlesson = new LessonPlan();
                $newlesson->number_of_lesson = $contador;
                $newlesson->class_id = $request->id;
                $newlesson->content = 'Aula criada pelo sistema';
                $newlesson->notes = 'Faça uma chamada para adicionar';
                $newlesson->save();
            }
        }

        return route('teacher.lesson-index', $request->id);
    }

    public function edit(Request $request){

        $lesson = LessonPlan::where('id', $request->id)->first();
        $lesson->content = $request->content;
        $lesson->notes = $lesson->notes;
        $lesson->save();

        return redirect()->route('teacher.lesson-index', $request->class_id);
    }

    public function editForm ($id) {
        $lesson = LessonPlan::where('id', $id)->first();

        return view('teachers.class-plan.edit_form', ['lesson' => $lesson]);
    }
}
