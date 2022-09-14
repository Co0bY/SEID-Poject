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
        $teacher = Teacher::where('cpf', $request['cpf'])->first();

        $discipline = new Discipline;
        $discipline->discipline_name = $request['discipline_name'];
        $discipline->idteacher = $teacher->id;
        $discipline->code = $request['code'];
        $discipline->save();
        $disciplines = Discipline::get();
        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

    public function show($id){
        $discipline = Discipline::where('id',$id)->first();
        $teacher = Teacher::where('id', $discipline->idteacher)->first();

        $discipline->tacher_name = $teacher->name;
        $discipline->cpf = $teacher->cpf;


        return view('secretary.disciplines.discipline_update', ['discipline' => $discipline]);
    }

    public function update(Request $request){
        $teacher = Teacher::where('cpf', $request['cpf'])->first();

        $discipline = Discipline::where('id', $request['id']);
        $discipline->name = $request['name'];
        $discipline->idteacher = $teacher->id;
        $discipline->code = $request['code'];
        $discipline->save();

        $disciplines = Discipline::get();
        return view('secretary.disciplines.index', ['disciplines' => $disciplines]);
    }

    public function delete(){

    }

}
