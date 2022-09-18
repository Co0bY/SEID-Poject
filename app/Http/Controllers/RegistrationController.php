<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        $registrations = Registration::get();

        return view('secretary.Registrations.index', ['registrations' => $registrations]);
    }

    public function createform(){
        return view('secretary.Registrations.registration_create');
    }
    public function create(Request $request){
        $student = Student::where('cpf',$request['cpf'])->first();

        $registration = new Registration;

        $matricula = substr($request['name'], 0, 4) . substr($request['cpf'], 0, 4) . substr($request['expiration_date'], 0, 4);
        $expiration_date = $request['expiration_date'];
        $registration->idstudent = $student->id;
        $registration->registration = $matricula;
        $registration->expiration_date = $expiration_date;
        $registration->save();

        $registrations = Registration::get();


        return view('secretary.Registrations.index', ['registrations' => $registrations]);
    }

    public function show(Request $request){
        $registration = Registration::where('id', $request['id'])->first();

        return view('', ['registration' => $registration]);
    }

    public function update(){
        $registration = Registration::where('id', $request['id'])->first();
        $matricula = $request['registration'];
        $expiration_date = $request['expiration_date'];
        $registration->registration = $matricula;
        $registration->expiration_date = $expiration_date;
        $registration->save();

    }

    public function delete(){

    }
}