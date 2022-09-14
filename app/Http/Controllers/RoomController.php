<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::get();

        return view('secretary.room.index', ['rooms' => $rooms]);
    }

    public function createform(){
        return view('secretary.room.room_create');
    }

    public function create(Request $request){


        $room = new Room;
        $room->name = $request['name'];
        $room->details = $request['details'];
        $room->number_of_tables = $request['number_of_tables'];
        $room->additional_equipment = $request['additional_equipment'];
        $room->save();

        $rooms = Room::get();

        return view('secretary.room.index', ['rooms' => $rooms]);
    }

    public function show(Request $request){
        $room = Room::where('id', $request['id'])->first();

        return view('', ['room' => $room]);
    }

    public function update(){
        $registration = Room::where('id', $request['id'])->first();
        $room->name = $request['name'];
        $room->details = $request['details'];
        $room->number_of_tables = $request['number_of_tables'];
        $room->additional_equipment = $request['additional_equipment'];
        $room->code = $request['code'];
        $room->save();

    }

    public function delete(){

    }
}
