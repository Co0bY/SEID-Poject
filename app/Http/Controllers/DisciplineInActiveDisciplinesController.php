<?php

namespace App\Http\Controllers;

use App\Models\ActiveDiscpline;
use App\Models\DisciplinesInActiveDiscipline;
use Illuminate\Http\Request;

class DisciplineInActiveDisciplinesController extends Controller
{

    public function addform(){
        return view('secretary.active.assigning_discipline');
    }

    public function addDiscipline(Request $request){
        $discipline = Discipline::where('code', $request['code'])->first();
        $active_discipline = ActiveDiscpline::where('code', $request['code_active'])->first();
        $active = new DisciplinesInActiveDiscipline;
        $active->id_discipline = $discipline->id;
        $registration->id_active_discpline = $active_discipline->id;
        $registration->save();

        return view('');
    }

    public function removeDiscipline($id){
        $registration = DisciplinesInActiveDiscipline::where('id', $id)->first();
        $registration->delete();

        return view('');
    }
    public function show(){

    }
    public function edit(){

    }
}
