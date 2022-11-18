<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Season;
use App\Models\Discipline;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{
    public function index(){
        $classes = Classes::with('room')->orderByDesc('id')->paginate(10);

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }

    public function createform(){
        return view('secretary.schoolclass.class_create');
    }

    public function create(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*',
            'season_code.exists' => 'O código do período informado não existe na base*',
            'discipline_code.exists' => 'O código da disciplina informado não existe na base*',
            'room_code.exists' => 'O código da sala informado não existe na base*',
        ];
        $rules = [
            'name' => 'required|unique:courses|max:255',
            'code' => 'required|unique:courses|max:255',
            'season_code' => ['required', Rule::exists('seasons', 'code')],
            'discipline_code' => ['required', Rule::exists('disciplines', 'code')],
            'room_code' => ['required', Rule::exists('rooms', 'code')],
        ];
        $request->validate($rules, $descriptions);
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
        $season = Season::where('id', $class->id_season)->first();
        $discipline = Discipline::where('id', $class->id_discipline)->first();
        $room = Room::where('id', $class->id_room)->first();

        $class->season_code = $season->code;
        $class->discipline_code = $discipline->code;
        $class->room_code = $room->code;
        return view('secretary.schoolclass.class_update', ['class' => $class]);
    }

    public function update(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*',
            'season_code.exists' => 'O código do período informado não existe na base*',
            'discipline_code.exists' => 'O código da disciplina informado não existe na base*',
            'room_code.exists' => 'O código da sala informado não existe na base*',
        ];
        $rules = [
            'name' => ['required', Rule::unique('classes')->ignore($request['id'])],
            'code' => ['required', Rule::unique('classes')->ignore($request['id'])],
            'season_code' => ['required', Rule::exists('seasons', 'code')],
            'discipline_code' => ['required', Rule::exists('disciplines', 'code')],
            'room_code' => ['required', Rule::exists('rooms', 'code')],
        ];
        $request->validate($rules, $descriptions);
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

    public function filtro(Request $request){
        $name = $request->name;
        $code = $request->code;

        $query = Classes::query();

        if($name != ""){
           $query->where('name', 'like', "%$name%");
        }
        if($code != ""){
            $query->where('code', 'like', "%$code%");
        }

        $classes = $query->with('room')->orderByDesc('id')->paginate(10);

        return view('secretary.schoolclass.index', ['classes' => $classes]);
    }
}
