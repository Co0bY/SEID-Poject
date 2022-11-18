<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DisciplineController extends Controller
{

    public function index(){
        $disciplines = Discipline::get();

        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

    public function createform(){
        return view('secretary.disciplines.discipline_create');
    }

    public function create(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O código informado já está em uso*'
        ];
        $rules = [
            'name' => 'required|unique:disciplines|max:255',
            'code' => 'required|unique:disciplines|max:255',
        ];
        $request->validate($rules, $descriptions);
        $discipline = new Discipline;
        $discipline->name = $request['name'];
        $discipline->code = $request['code'];
        $discipline->active = true;
        $discipline->save();
        $disciplines = Discipline::get();
        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

    public function show($id){
        $discipline = Discipline::where('id',$id)->first();


        return view('secretary.disciplines.discipline_update', ['discipline' => $discipline]);
    }

    public function update(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*'
        ];
        $rules = [
            'name' => ['required', Rule::unique('disciplines')->ignore($request['id'])->where(fn ($query) => $query->where('name', $request['name']))],
            'code' => ['required', Rule::unique('disciplines')->ignore($request['id'])],
        ];
        $request->validate($rules, $descriptions);
        $discipline = Discipline::where('id', $request['id'])->first();
        $discipline->name = $request['name'];
        $discipline->code = $request['code'];
        $discipline->active = true;
        $discipline->save();

        return redirect()->route('secretary.discipline-index');
    }

    public function delete(){

    }

    public function filtro(Request $request){
        $discipline_name = $request->discipline_name;
        $code = $request->code;

        $query = Discipline::query();

        if($discipline_name != ""){
           $query->where('name', 'like', "%$discipline_name%");
        }
        if($code != ""){
            $query->where('code', 'like', "%$code%");
        }

        $disciplines = $query->orderByDesc('id')->paginate(10);

        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

}
