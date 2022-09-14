<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        $schedule = Schedule::get();
    }

    public function create(Request $request){

        $active = ActiveDiscpline::where('code', $request['code'])->first();

        $schedule = new Schedule;
        $schedule->id_active_discpline = $active->id;
        $schedule->day_of_the_week = $request['day_of_the_week'];
        $schedule->start_time = $request['start_time'];
        $schedule->end_time = $request['end_time'];
        $schedule->save();

        return view('');
    }

    public function show(Request $request){
        $schedule = Schedule::where('id', $request['id'])->first();

        return view('', ['schedule' => $schedule]);
    }

    public function update(){
        $active = ActiveDiscpline::where('code', $request['code'])->first();

        $schedule = new Schedule;
        $schedule->id_active_discpline = $active->id;
        $schedule->day_of_the_week = $request['day_of_the_week'];
        $schedule->start_time = $request['start_time'];
        $schedule->end_time = $request['end_time'];
        $schedule->save();

    }

    public function delete(){

    }
}
