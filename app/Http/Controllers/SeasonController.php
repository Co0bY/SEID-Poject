<?php

namespace App\Http\Controllers;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeasonController extends Controller
{
    public function index(){
        $seasons = Season::get();

        return view('secretary.seasons.index', ['seasons' => $seasons]);
    }

    public function createform(){
        return view('secretary.seasons.season_create');
    }

    public function create(Request $request){

        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*',
            'date' => 'Insira uma data válida*'
        ];
        $rules = [
            'name' => 'required|unique:courses|max:255',
            'code' => 'required|unique:courses|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
        $request->validate($rules, $descriptions);
        $season = new Season;
        $season->name = $request['name'];
        $season->start_date = $request['start_date'];
        $season->end_date = $request['end_date'];
        $season->active = true;
        $season->code = $request['code'];
        $season->save();

        $seasons = Season::get();

        return view('secretary.seasons.index', ['seasons' => $seasons]);
    }

    public function show($id){
        $season = Season::where('id', $id)->first();

        return view('secretary.seasons.season_update', ['season' => $season]);
    }

    public function update(Request $request){
        $descriptions = [
            'required' => 'Este campo deve ser preenchido*',
            'name.unique' => 'O nome informado já está em uso*',
            'code.unique' => 'O codigo informado já está em uso*',
            'date' => 'Insira uma data válida*'
        ];
        $rules = [
            'name' => ['required', Rule::unique('classes')->ignore($request['id'])],
            'code' => ['required', Rule::unique('classes')->ignore($request['id'])],
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
        $request->validate($rules, $descriptions);
        $season = Season::where('id', $request['id'])->first();
        $season->name = $request['name'];
        $season->start_date = $request['start_date'];
        $season->end_date = $request['end_date'];
        $season->active = true;
        $season->code = $request['code'];
        $season->save();

        return redirect()->route('secretary.season-index');
    }

    public function delete(){

    }
}
