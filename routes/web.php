<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('loginscreen');}
)->name('home');

Route::post('/fazerlogin', [\App\Http\Controllers\LoginController::class, 'login'])->name('fazer.login');



Auth::routes();


Route::prefix('/principal')->group(function(){
    Route::get('/home', [\App\Http\Controllers\PrincipalController::class, 'index'])->name('principal.index');
    Route::get('/users', [\App\Http\Controllers\PrincipalController::class, 'users'])->name('principal.users');
    Route::post('/users', [\App\Http\Controllers\PrincipalController::class, 'filtroUsuarios'])->name('principal.users-filtro');
    Route::get('/createform',  [\App\Http\Controllers\PrincipalController::class, 'createform'])->name('principal.create-form');
    Route::post('/create', [\App\Http\Controllers\PrincipalController::class, 'create'])->name('principal.create');
    Route::get('/editform/{id?}',  [\App\Http\Controllers\PrincipalController::class, 'editform'])->name('principal.edit-form');
    Route::post('/update', [\App\Http\Controllers\PrincipalController::class, 'updateuser'])->name('principal.update');
    Route::get('/deleteform/{id?}',  [\App\Http\Controllers\PrincipalController::class, 'deleteform'])->name('principal.delete-form');
    Route::post('/delete', [\App\Http\Controllers\PrincipalController::class, 'deleteuser'])->name('principal.delete');
});

Route::prefix('/secreatry')->group(function(){
    Route::get('/home', [\App\Http\Controllers\SecretaryController::class, 'index'])->name('secretary.index');
    Route::get('/users/', [\App\Http\Controllers\SecretaryController::class, 'users'])->name('secretary.users');
    Route::post('/users', [\App\Http\Controllers\SecretaryController::class, 'filtroUsuarios'])->name('secretary.users-filtro');
    Route::get('/createform',  [\App\Http\Controllers\SecretaryController::class, 'createform'])->name('secretary.create-form');
    Route::post('/create', [\App\Http\Controllers\SecretaryController::class, 'create'])->name('secretary.create');
    Route::get('/editform/{id?}',  [\App\Http\Controllers\SecretaryController::class, 'editform'])->name('secretary.edit-form');
    Route::post('/update', [\App\Http\Controllers\SecretaryController::class, 'updateuser'])->name('secretary.update');
    Route::get('/deleteform',  [\App\Http\Controllers\SecretaryController::class, 'deleteform'])->name('secretary.delete-form');
    Route::post('/delete/{id?}', [\App\Http\Controllers\SecretaryController::class, 'deleteuser'])->name('secretary.delete');

    Route::get('/discipline', [\App\Http\Controllers\DisciplineController::class, 'index'])->name('secretary.discipline-index');
    Route::get('/dcreateform',  [\App\Http\Controllers\DisciplineController::class, 'createform'])->name('secretary.discipline-create-form');
    Route::post('/dcreate', [\App\Http\Controllers\DisciplineController::class, 'create'])->name('secretary.discipline-create');

    Route::get('/registration', [\App\Http\Controllers\RegistrationController::class, 'index'])->name('secretary.registration-index');
    Route::get('/rcreateform',  [\App\Http\Controllers\RegistrationController::class, 'createform'])->name('secretary.registration-create-form');
    Route::post('/rcreate', [\App\Http\Controllers\RegistrationController::class, 'create'])->name('secretary.registration-create');

    Route::get('/room', [\App\Http\Controllers\RoomController::class, 'index'])->name('secretary.room-index');
    Route::get('/rocreateform',  [\App\Http\Controllers\RoomController::class, 'createform'])->name('secretary.room-create-form');
    Route::post('/rocreate', [\App\Http\Controllers\RoomController::class, 'create'])->name('secretary.room-create');

    Route::get('/class', [\App\Http\Controllers\ClassController::class, 'index'])->name('secretary.class-index');
    Route::get('/ccreateform',  [\App\Http\Controllers\ClassController::class, 'createform'])->name('secretary.class-create-form');
    Route::post('/ccreate', [\App\Http\Controllers\ClassController::class, 'create'])->name('secretary.class-create');

    Route::get('/active', [\App\Http\Controllers\ActiveDisciplineControler::class, 'index'])->name('secretary.active-index');
    Route::get('/acreateform',  [\App\Http\Controllers\ActiveDisciplineControler::class, 'createform'])->name('secretary.active-create-form');
    Route::post('/acreate', [\App\Http\Controllers\ActiveDisciplineControler::class, 'create'])->name('secretary.active-create');

    Route::get('/add/classform',  [\App\Http\Controllers\ClassInActiveDisciplinesControler::class, 'addform'])->name('secretary.active.assign-class-form');
    Route::get('/add/class',  [\App\Http\Controllers\ClassInActiveDisciplinesControler::class, 'addClass'])->name('secretary.active.assign-class');

    Route::get('/addregistrationform',  [\App\Http\Controllers\RegistrationInActiveDisciplineController::class, 'addform'])->name('secretary.active.assign-registration-form');
    Route::get('/addregistration',  [\App\Http\Controllers\RegistrationInActiveDisciplineController::class, 'addRegistration'])->name('secretary.active.assign-registration');

    Route::get('/add/disciplineform',  [\App\Http\Controllers\DisciplineInActiveDisciplinesController::class, 'addform'])->name('secretary.active.assign-discipline-form');
    Route::get('/add/discipline',  [\App\Http\Controllers\DisciplineInActiveDisciplinesController::class, 'addDiscipline'])->name('secretary.active.assign-discipline');
});