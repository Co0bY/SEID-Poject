<?php

namespace App\Http\Controllers;
use App\Models\Season;
use Illuminate\Http\Request;

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
