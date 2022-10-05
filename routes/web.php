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
    Route::get('/room/createform',  [\App\Http\Controllers\RoomController::class, 'createform'])->name('secretary.room-create-form');
    Route::post('/room/create', [\App\Http\Controllers\RoomController::class, 'create'])->name('secretary.room-create');

    Route::get('/class', [\App\Http\Controllers\ClassController::class, 'index'])->name('secretary.class-index');
    Route::get('/class/createform',  [\App\Http\Controllers\ClassController::class, 'createform'])->name('secretary.class-create-form');
    Route::post('/class/create', [\App\Http\Controllers\ClassController::class, 'create'])->name('secretary.class-create');
    Route::post('/class/addStudent', [\App\Http\Controllers\RegistrationsInClassesController::class, 'addStudent'])->name('secretary.add-student');
    Route::get('/class/StudentForm', [\App\Http\Controllers\RegistrationsInClassesController::class, 'addform'])->name('secretary.add-student-form');
    Route::post('/class/addTeacher', [\App\Http\Controllers\TeacherInClassesController::class, 'addTeacher'])->name('secretary.add-teacher');
    Route::get('/class/TeacherForm', [\App\Http\Controllers\TeacherInClassesController::class, 'addform'])->name('secretary.add-teacher-form');

    Route::get('/addregistrationform',  [\App\Http\Controllers\RegistrationsInClassesController::class, 'addform'])->name('secretary.active.assign-registration-form');
    Route::get('/addregistration',  [\App\Http\Controllers\RegistrationsInClassesController::class, 'addRegistration'])->name('secretary.active.assign-registration');

    Route::get('/season', [\App\Http\Controllers\SeasonController::class, 'index'])->name('secretary.season-index');
    Route::get('/season/createform',  [\App\Http\Controllers\SeasonController::class, 'createform'])->name('secretary.season-create-form');
    Route::post('/season/create', [\App\Http\Controllers\SeasonController::class, 'create'])->name('secretary.season-create');
});

Route::prefix('/teacher')->group(function(){
   Route::get('/home' , [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.index');

   //attendance
   Route::get('/attendance' , [\App\Http\Controllers\TeacherController::class, 'listClassesAttendance'])->name('teacher.attendance');
   Route::get('/presence/form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsAttendance'])->name('teacher.attendance-form');
   Route::post('/presence/makepresence' , [\App\Http\Controllers\TeacherController::class, 'makeAttendance'])->name('teacher.attendance-make');

    //Score
   Route::get('/score' , [\App\Http\Controllers\TeacherController::class, 'listClassesScore'])->name('teacher.score');
   Route::get('/score/form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsScore'])->name('teacher.score-form');
   Route::post('/score/makescore' , [\App\Http\Controllers\TeacherController::class, 'makeScore'])->name('teacher.attendance-score');
   Route::get('/score/edit-form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsScoreEdit'])->name('teacher.score-list-form');
   Route::get('/score/StudentScore/{id?}&{classid?}' , [\App\Http\Controllers\TeacherController::class, 'editStudentScore'])->name('teacher.score-edit-form');
   Route::post('/score/StudentScore/Update' , [\App\Http\Controllers\TeacherController::class, 'updateStudentScore'])->name('teacher.score-update');

   //Homework
   Route::get('/homework' , [\App\Http\Controllers\TeacherController::class, 'listClassesHomework'])->name('teacher.homework');
   Route::get('/homework/assigned/{id?}' , [\App\Http\Controllers\TeacherController::class, 'assignedHomeworkForm'])->name('teacher.homework-assigned');
   Route::get('/homework/create' , [\App\Http\Controllers\TeacherController::class, 'createHomework'])->name('teacher.homework-create');
});
