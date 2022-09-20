<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(){
        $seasons = Season::get();

        return view('secretary.season.index', ['seasons' => $seasons]);
    }

    public function createform(){
        return view('secretary.season.season_create');
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

        return view('secretary.season.index', ['seasons' => $seasons]);
    }

    public function show(Request $request){
        $season = Season::where('id', $request['id'])->first();

        return view('', ['season' => $season]);
    }

    public function update(){
        $season = Season::where('id', $request['id'])->first();
        $season->name = $request['name'];
        $season->start_date = $request['start_date'];
        $season->end_date = $request['end_date'];
        $season->active = true;
        $season->code = $request['code'];
        $season->save();

    }

    public function delete(){

    }
}