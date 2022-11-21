<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Registration;
use App\Models\RegistrationsInClasses;
use App\Models\Season;
use App\Models\StudentsInCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeasonController extends Controller
{
    public function index(){
        $seasons = Season::where('active',1)->paginate(10);
        $active = 1;
        return view('secretary.seasons.index', ['seasons' => $seasons, 'active' => $active]);
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
        $season->active = 1;
        $season->save();

        $seasons = Season::get();

        return redirect()->route('secretary.season-index');
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

    public function deleteForm($id){
        $season = Season::where('id', $id)->first();

        return view('secretary.seasons.delete_form', ['season' => $season]);
    }

    public function delete(Request $request){
        $season = Season::where('id', $request->id)->first();
        $season->active = 0;
        $season->save();

        $registrations = Registration::where('season_id', $season->id)->get();
        foreach($registrations as $registration){
            $registration->active = 0;
            $registration->save();
            $registrationsinclasses = RegistrationsInClasses::where('id_registration', $registration->id)->get();
            if(count($registrationsinclasses) > 0){
                foreach($registrationsinclasses as $registrationsinclasse){
                    $registrationsinclasse->active = 0;
                    $registrationsinclasse->save();
                }
            }
            $registrationincourse = StudentsInCourse::where('registration_id', $registration->id)->first();
            if(isset($registrationincourse)){
                $registrationincourse->active = 0;
                $registrationincourse->save();
            }
        }

        $classes = Classes::where('id_season', $season->id)->get();
        foreach($classes as $class){
            $class->active = 0;
            $class->save();
        }

        return redirect()->route('secretary.season-index');
    }

    public function filtro(Request $request){
        $name = $request->name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $code = $request->code;

        $query = Season::query();

        if($name != ""){
           $query->where('name', 'like', "%$name%");
        }
        if($start_date != ""){
            $query->where('start_date', 'like', "%$start_date%");
         }
         if($end_date != ""){
            $query->where('equipment', 'like', "%$end_date%");
         }
        if($code != ""){
            $query->where('code', 'like', "%$code%");
        }
        $query->where('active',1);
        $active = 1;

        $seasons = $query->orderByDesc('id')->paginate(10);

        return view('secretary.seasons.index', ['seasons' => $seasons, 'active' => $active]);
    }

    public function seasonInactive(){
        $seasons = Season::where('active', 0)->paginate(10);
        $active = 0;
        return view('secretary.seasons.index', ['seasons' => $seasons, 'active' => $active]);
    }

    public function filtroInativos(Request $request){
        $name = $request->name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $code = $request->code;

        $query = Season::query();

        if($name != ""){
           $query->where('name', 'like', "%$name%");
        }
        if($start_date != ""){
            $query->where('start_date', 'like', "%$start_date%");
         }
         if($end_date != ""){
            $query->where('equipment', 'like', "%$end_date%");
         }
        if($code != ""){
            $query->where('code', 'like', "%$code%");
        }
        $query->where('active',0);
        $active = 0;

        $seasons = $query->orderByDesc('id')->paginate(10);

        return view('secretary.seasons.index', ['seasons' => $seasons, 'active' => $active]);
    }

    public function reactiveForm($id){
        $season = Season::where('id', $id)->first();

        return view('secretary.seasons.reactive_form', ['season' => $season]);
    }

    public function reactiveSeason(Request $request){
        $season = Season::where('id', $request->id)->first();
        $season->active = 1;
        $season->save();

        $registrations = Registration::where('season_id', $season->id)->get();
        foreach($registrations as $registration){
            $registration->active = 1;
            $registration->save();
            $registrationsinclasses = RegistrationsInClasses::where('id_registration', $registration->id)->get();
            if(count($registrationsinclasses) > 0){
                foreach($registrationsinclasses as $registrationsinclasse){
                    $registrationsinclasse->active = 1;
                    $registrationsinclasse->save();
                }
            }
            $registrationincourse = StudentsInCourse::where('registration_id', $registration->id)->first();
            if(isset($registrationincourse)){
                $registrationincourse->active = 1;
                $registrationincourse->save();
            }
        }

        $classes = Classes::where('id_season', $season->id)->get();
        foreach($classes as $class){
            $class->active = 1;
            $class->save();
        }

        return redirect()->route('secretary.season-index');
    }
}
