<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use App\Models\Secretary;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecretaryController extends Controller
{
    public function index(){
        return view('secretary.home');
    }
    public function users(Request $request){
        $users =  DB::table('user_filter')->where('active',1)->orderByDesc('id')->paginate(2);
        $active = 1;
        return view('secretary.users', ['users' => $users, 'active' => $active, 'request' => $request->all()]);
    }
    public function createform(){
        return view('secretary.user_create');
    }

    public function create(Request $request){
        // dd($request);
        $email = $request['email'];
        $password = $request['password'];
        $name = $request['name'];
        $usertype = $request['type_of_user'];

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->type_of_user = $usertype;
        $user->active = 1;
        // dd($user);
        $user->save();

        $user = User::where('email', $email)->first();
        $id = $user->id;

        if($request['type_of_user'] == '1'){
            $perfil = new secretary();
        }
        elseif($request['type_of_user'] == '2'){
            $perfil = new Secretary();
        }
        elseif($request['type_of_user'] == '3'){
            $perfil = new Student();
        }
        elseif($request['type_of_user'] == '4'){
            $perfil = new Teacher();
        }
        $data = $request['birth_date'];
        $perfil->user_id = $id;
        $perfil->cpf = $request['cpf'];
        $perfil->name = $request['name'];
        $perfil->email = $request['email'];
        $perfil->address = $request['address'];
        $perfil->birth_date = $data;
        $perfil->picture = "Ainda em produção";
        // dd($user);
        $perfil->save();

        return redirect()->route('secretary.users-filtro');

    }

    public function filtroUsuarios(Request $request){
        $name = $request['name'];
        $email = $request['email'];
        $cpf = $request['cpf'];
        $address = $request['address'];
        $birth_date = $request['birth_date'];
        $type_of_user = $request['type_of_user'];
        $active = $request['active'];

        $query = DB::table('user_filter');

        if($name != ""){
           $query->where('user_filter.name', 'like', "%$name%");
        }
        if($email != ""){
            $query->where('user_filter.email', 'like', "%$email%");
        }
        if($type_of_user != ""){
            $query->where('user_filter.type_user', $type_of_user);
        }
        if($cpf != ""){
            $query->where('user_filter.cpf', 'like', "%$cpf%");
        }
        if($address != ""){
            $query->where('user_filter.address', 'like', "%$address%");
        }
        if($birth_date != ""){
            $query->where('user_filter.birth_date', 'like', "%$birth_date%");
        }
        if($active) $query->where('active', $active);

        $users = $query->orderByDesc('id')->paginate(2);

        return view('secretary.users', ['users' => $users, 'active' => $active, 'request' => $request->all() ]);
    }
    public function editform($id){
        $user = User::where('id', $id)->first();
        // dd($user);
        if($user->type_of_user == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
        }
        return view('secretary.user_update', ['user' => $user, 'perfil' => $perfil]);
    }
    public function updateuser(Request $request){

        $user = User::where('id', $request['id'])->first();

        $email = $request['email'];
        $password = $request['password'];
        $name = $request['name'];
        $usertype = $request['type_of_user'];

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->type_of_user = $usertype;
        $user->active = 1;



        if($request['type_of_user'] == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
        }
        elseif($request['type_of_user'] == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
        }
        elseif($request['type_of_user'] == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
        }
        elseif($request['type_of_user'] == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
        }
        $data = $request['birth_date'];
        $perfil->user_id = $request['id'];
        $perfil->cpf = $request['cpf'];
        $perfil->name = $request['name'];
        $perfil->email = $request['email'];
        $perfil->address = $request['address'];
        $perfil->birth_date = $data;
        $perfil->picture = "Ainda em produção";
        // dd($user);
        $perfil->save();
        $user->save();


        return redirect()->route('secretary.users-filtro');
    }

    public function deleteform($id){
        $user = User::where('id', $id)->first();
        if($user->type_of_user == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
        }
        return view('secretary.user_delete', ['user' => $user, 'perfil' => $perfil]);
    }

    public function deleteUser(Request $request){
        $user = User::where('id', $request['id'])->first();
        if($user->type_of_user == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        $user->active = 0;
        $user->save();

        return redirect()->route('secretary.users-filtro');
    }

    public function usersinactive(){
        $users =  DB::table('user_filter')->where('active',0)->orderByDesc('id')->paginate(10);
        $active = 0;
        return view('secretary.users', ['users' => $users, 'active' => 0]);
    }

    public function reactiveForm($id){
        $user = User::where('id', $id)->first();
        if($user->type_of_user == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
        }
        elseif($user->type_of_user == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
        }
        return view('secretary.user_reactive', ['user' => $user, 'perfil' => $perfil]);
    }

    public function reActiveUser(Request $request){
        $user = User::where('id', $request['id'])->first();
        if($user->type_of_user == '1'){
            $perfil = Principal::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '2'){
            $perfil = Secretary::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '3'){
            $perfil = Student::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        elseif($user->type_of_user == '4'){
            $perfil = Teacher::where('user_id', $user->id)->first();
            // $perfil->delete();
        }
        $user->active = 1;
        $user->save();

        return redirect()->route('secretary.users-filtro');
    }
}
