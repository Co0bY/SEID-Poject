<?php

namespace App\Http\Controllers;

use App\Models\ActiveDiscpline;
use App\Models\RegistrationsInActiveDiscipline;
use Illuminate\Http\Request;

class RegistrationInActiveDisciplineController extends Controller
{

    public function addform(){
        return view('secretary.active.assigning_registration');
    }

    public function addStudent(Request $request){
        $matricula = Registration::where('registration', $request['registration'])->first();
        $active_discipline = ActiveDiscpline::where('code', $request['code_active']);
        $registration = new RegistrationsInActiveDiscipline;
        $registration->id_registration = $matricula->id;
        $registration->id_active_discpline = $active_discipline->id;
        $registration->save();

        $disciplines = ActiveDiscpline::get();

        return view('secretary.active.index', ['disciplines' => $disciplines]);
    }

    public function removeStudent($id){
        $registration = RegistrationsInActiveDiscipline::where('id', $id)->first();
        $registration->delete();

        return view('');
    }
    public function show(){

    }
    public function edit(){

    }
}
