<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\ActiveDiscpline;
use Illuminate\Http\Request;

class ActiveDisciplineControler extends Controller
{
    public function index(){
        $disciplines = ActiveDiscpline::get();

        return view('secretary.active.index', ['disciplines' => $disciplines]);
    }

    public function createform(){
        return view('secretary.active.active_create');
    }

    public function create(Request $request){
        $room = Room::where('code', $request['roomcode'])->first();

        $discipline = new ActiveDiscpline;
        $discipline->name = $request['name'];
        $discipline->expiration_date = $request['expiration_date'];
        $discipline->code = $request['code'];
        $discipline->idroom = $room->id;
        $discipline->save();
        $disciplines = ActiveDiscpline::get();

        return view('secretary.active.index', ['disciplines' => $disciplines]);
    }

    public function show($id){
        $discipline = ActiveDiscpline::where('id',$id)->first();
        $room = Room::where('id', $discipline->idroom)->first();

        $discipline->room_name = $room->name;


        return view('', ['discipline' => $discipline]);
    }

    public function update(Request $request){
        $room = Room::where('id', $request['roomid'])->first();

        $discipline = new ActiveDiscpline;
        $discipline->name = $request['name'];
        $discipline->expiration_date = $request['expiration_date'];
        $discipline->code = $request['code'];
        $discipline->idroom = $room->id;
        $discipline->save();
        $disciplines = Discipline::get();
        return view('secretary.disciplines.activediscipline', ['disciplines' => $disciplines]);
    }

    public function delete(){

    }
}
