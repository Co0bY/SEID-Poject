<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Discipline;
use Illuminate\Http\Request;

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
        $discipline = new Discipline;
        $discipline->name = $request['discipline_name'];
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

        $discipline = Discipline::where('id', $request['id']);
        $discipline->name = $request['discipline_name'];
        $discipline->code = $request['code'];
        $discipline->active = true;
        $discipline->save();

        $disciplines = Discipline::get();
        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

    public function delete(){

    }

}
