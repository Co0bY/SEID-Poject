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
                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->name;
                $_SESSION['type_of_user'] = $user->type_of_user;

                return redirect()->route('principal.index');
            }elseif($user->type_of_user == 2){
                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->name;
                $_SESSION['type_of_user'] = $user->type_of_user;

                return redirect()->route('secretary.index');
            }elseif($user->type_of_user == 3){
                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->name;
                $_SESSION['type_of_user'] = $user->type_of_user;

                return redirect()->route('student.index');
            }elseif($user->type_of_user == 4){
                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->name;
                $_SESSION['type_of_user'] = $user->type_of_user;

                return redirect()->route('teacher.index');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
}
