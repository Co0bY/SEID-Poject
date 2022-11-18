<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*'
        ];
        $rules = [
            'name' => 'required|unique:rooms|max:255',
            'code' => 'required|unique:rooms|max:255',
            'details' => 'required',
            'equipment' => 'required',
        ];
        $request->validate($rules, $descriptions);
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
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*'
        ];
        $rules = [
            'name' => ['required', Rule::unique('rooms')->ignore($request['id'])],
            'code' => ['required', Rule::unique('rooms')->ignore($request['id'])],
            'equipment' => 'required',
            'details' => 'required',
        ];
        $request->validate($rules, $descriptions);
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

    public function filtro(Request $request){
        $name = $request->name;
        $details = $request->details;
        $equipment = $request->equipment;
        $code = $request->code;

        $query = Room::query();

        if($name != ""){
           $query->where('name', 'like', "%$name%");
        }
        if($details != ""){
            $query->where('details', 'like', "%$details%");
         }
         if($equipment != ""){
            $query->where('equipment', 'like', "%$equipment%");
         }
        if($code != ""){
            $query->where('code', 'like', "%$code%");
        }

        $rooms = $query->orderByDesc('id')->paginate(10);

        return view('secretary.room.index', ['rooms' => $rooms]);
    }
}
