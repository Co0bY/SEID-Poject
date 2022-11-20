<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class LoginController extends Controller
{
    public function login(Request $request){


        $email = $request['email'];
        $password = $request['password'];

        $user = User::where('email', $email)->where('password', $password)->first();
        if(isset($user)){
            if($user->type_of_user == 1){
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('type_of_user', $user->type_of_user);

                return redirect()->route('principal.index');
            }elseif($user->type_of_user == 2){
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('type_of_user', $user->type_of_user);

                return redirect()->route('secretary.index');
            }elseif($user->type_of_user == 3){
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('type_of_user', $user->type_of_user);

                return redirect()->route('student.index');
            }elseif($user->type_of_user == 4){

                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('type_of_user', $user->type_of_user);
                // $_SESSION['id'] = $user->id;
                // $_SESSION['nome'] = $user->name;
                // $_SESSION['type_of_user'] = $user->type_of_user;

                return redirect()->route('teacher.index');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function logout(){
        // session()->destroy();

        return redirect()->route('home');
    }
}
