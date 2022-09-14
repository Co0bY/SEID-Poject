<?php

namespace App\Http\Controllers;

use App\Models\ActiveDiscpline;
use App\Models\SchoolClass;
use App\Models\SchoolClassOfActiveDiscipline;
use Illuminate\Http\Request;

class ClassInActiveDisciplinesControler extends Controller
{

    public function addform(){
        return view('secretary.active.assigning_class');
    }

    public function addClass(Request $request){
        $schoolclass = SchoolClass::where('code', $request['class_code'])->first();
        $active_discipline = ActiveDiscpline::where('code', $request['code_active'])->first();
        $active = new SchoolClassOfActiveDiscipline;
        $active->id_schoolclass = $schoolclass->id;
        $active->id_active_discpline = $active_discipline->id;
        $active->save();

        $disciplines = ActiveDiscpline::get();

        return view('secretary.active.index', ['disciplines' => $disciplines]);
    }

    public function removeDiscipline($id){
        $schoolclass = SchoolClassOfActiveDiscipline::where('id', $id)->first();
        $schoolclass->delete();

        return view('');
    }
    public function show(){

    }
    public function edit(){

    }
}
