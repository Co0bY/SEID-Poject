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
        $room->equipment = $request['equipment'];
        $room->code = $request['code'];
        $room->save();

        $rooms = Room::get();

        return view('secretary.room.index', ['rooms' => $rooms]);
    }

    public function show($id){
        $room = Room::where('id', $id)->first();

        return view('secretary.room.room_update', ['room' => $room]);
    }

    public function update(Request $request){
        $room = Room::where('id', $request['id'])->first();
        $room->name = $request['name'];
        $room->details = $request['details'];
        $room->equipment = $request['equipment'];
        $room->code = $request['code'];
        $room->save();

        return redirect()->route('secretary.room-index');
    }

    public function delete(){

    }
}
