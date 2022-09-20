<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teacher = Teacher::where('id', $_SESSION['id'])->first();
        $discipline = Discipline::select('id')->where('idteacher', $teacher->id)->get();
        $t = count($discipline);
        $lig = [];
        $active = [];
        $disciplines = [];
        for ($i = 0; $i <= $t; $i++) {
            $today = date('Y-m-d');
            $lig[$i] = DisciplinesInActiveDiscipline::where('id_discipline', $discipline[$i]->id)
            ->where('expiration_date', '>', $today)->first();
            $active[$i] = ActiveDiscpline::where('id', $lig[$i]->id)->get();
            $disciplines[$i] = $active[$i];
        }

        return view('teachers.index', ['disciplines' => $disciplines]);
    }

    public function listarAlunos($id){
        $students = RegistrationsInActiveDiscipline::where('id_active_discpline', $id)->get();
        $registrations = [];
        $t = count($students);
        for ($i = 0; $i <= $t; $i++) {
            $registrations[$i] = Registration::where('id', $students[$i]->idregistration)->first();
        }
        dd($registrations);
         return view(''. []);
    }
    public function listarAlunosChamada(Request $request, $id){
        $students = RegistrationsInActiveDiscipline::where('id_active_discpline', $id)->get();
        $registrations = [];
        $t = count($students);
        for ($i = 0; $i <= $t; $i++) {
            $registrations[$i] = Registration::where('id', $students[$i]->idregistration)->first();
        }

        return view(''. []);
    }
    public function listarAlunosNotas(Request $request){
        $students = RegistrationsInActiveDiscipline::where('id_active_discpline', $id)->get();
        $registrations = [];
        $t = count($students);
        for ($i = 0; $i <= $t; $i++) {
            $registrations[$i] = Registration::where('id', $students[$i]->idregistration)->first();
        }

        return view(''. []);
    }
}
