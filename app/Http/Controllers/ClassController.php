<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Season;
use App\Models\Discipline;
use App\Models\Room;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        $classes = Classes::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }

    public function createform(){
        return view('secretary.schoolclass.class_create');
    }

    public function create(Request $request){
        $season = Season::where('code', $request['season_code'])->first();
        $discipline = Discipline::where('code', $request['discipline_code'])->first();
        $room = Room::where('code', $request['room_code'])->first();

        $class = new Classes;
        $class->id_season = $season->id;
        $class->id_discipline = $discipline->id;
        $class->id_room = $room->id;
        $class->name = $request['name'];
        $class->code = $request['code'];
        $class->active = true;
        $class->save();

        $classes = Classes::get();

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }

    public function show($id){
        $class = Classes::where('id', $id)->first();
        $season = Season::where('id', $class->id)->first();
        $discipline = Discipline::where('id', $class->id)->first();
        $room = Room::where('id', $class->id)->first();

        $class->season_code = $season->code;
        $class->discipline_code = $discipline->code;
        $class->room_code = $room->code;
        return view('secretary.schoolclass.class_update', ['class' => $class]);
    }

    public function update(Request $request){
        $class = Classes::where('id', $request['id'])->first();
        $season = Season::where('code', $request['season_code'])->first();
        $discipline = Discipline::where('code', $request['discipline_code'])->first();
        $room = Room::where('code', $request['room_code'])->first();
        $class->id_season = $season->id;
        $class->id_discipline = $discipline->id;
        $class->id_room = $room->id;
        $class->name = $request->name;
        $class->code = $request->code;
        $class->active = true;
        $class->save();

        return redirect()->route('secretary.class-index');
    }

    public function delete(){

    }
}
