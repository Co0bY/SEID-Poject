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
    Route::get('/users/', [\App\Http\Controllers\PrincipalController::class, 'users'])->name('principal.users');
    Route::post('/users', [\App\Http\Controllers\PrincipalController::class, 'filtroUsuarios'])->name('principal.users-filtro');
    Route::get('/createform',  [\App\Http\Controllers\PrincipalController::class, 'createform'])->name('principal.create-form');
    Route::post('/create', [\App\Http\Controllers\PrincipalController::class, 'create'])->name('principal.create');
    Route::get('/editform/{id?}',  [\App\Http\Controllers\PrincipalController::class, 'editform'])->name('principal.edit-form');
    Route::post('/update', [\App\Http\Controllers\PrincipalController::class, 'updateuser'])->name('principal.update');
    Route::get('/deleteform/{id?}',  [\App\Http\Controllers\PrincipalController::class, 'deleteform'])->name('principal.delete-form');
    Route::post('/delete/', [\App\Http\Controllers\PrincipalController::class, 'deleteuser'])->name('principal.delete');
    Route::get('/users/inactive', [\App\Http\Controllers\PrincipalController::class, 'usersinactive'])->name('principal.users-inactive');
    Route::get('/reactiveform/{id?}',  [\App\Http\Controllers\PrincipalController::class, 'reactiveForm'])->name('principal.reactive-form');
    Route::post('/reactive/', [\App\Http\Controllers\PrincipalController::class, 'reActiveUser'])->name('principal.reactive');
});

Route::prefix('/secretary')->group(function(){
    Route::get('/home', [\App\Http\Controllers\SecretaryController::class, 'index'])->name('secretary.index');
    Route::get('/users/', [\App\Http\Controllers\SecretaryController::class, 'users'])->name('secretary.users');
    Route::post('/users', [\App\Http\Controllers\SecretaryController::class, 'filtroUsuarios'])->name('secretary.users-filtro');
    Route::get('/createform',  [\App\Http\Controllers\SecretaryController::class, 'createform'])->name('secretary.create-form');
    Route::post('/create', [\App\Http\Controllers\SecretaryController::class, 'create'])->name('secretary.create');
    Route::get('/editform/{id?}',  [\App\Http\Controllers\SecretaryController::class, 'editform'])->name('secretary.edit-form');
    Route::post('/update', [\App\Http\Controllers\SecretaryController::class, 'updateuser'])->name('secretary.update');
    Route::get('/deleteform/{id?}',  [\App\Http\Controllers\SecretaryController::class, 'deleteform'])->name('secretary.delete-form');
    Route::post('/delete/', [\App\Http\Controllers\SecretaryController::class, 'deleteuser'])->name('secretary.delete');
    Route::get('/users/inactive', [\App\Http\Controllers\SecretaryController::class, 'usersinactive'])->name('secretary.users-inactive');
    Route::get('/reactiveform/{id?}',  [\App\Http\Controllers\SecretaryController::class, 'reactiveForm'])->name('secretary.reactive-form');
    Route::post('/reactive/', [\App\Http\Controllers\SecretaryController::class, 'reActiveUser'])->name('secretary.reactive');

    Route::get('/discipline', [\App\Http\Controllers\DisciplineController::class, 'index'])->name('secretary.discipline-index');
    Route::post('/discipline', [\App\Http\Controllers\DisciplineController::class, 'filtro'])->name('secretary.discipline-filtro');
    Route::get('/dcreateform',  [\App\Http\Controllers\DisciplineController::class, 'createform'])->name('secretary.discipline-create-form');
    Route::post('/dcreate', [\App\Http\Controllers\DisciplineController::class, 'create'])->name('secretary.discipline-create');
    Route::get('/deditform/{id?}',  [\App\Http\Controllers\DisciplineController::class, 'show'])->name('secretary.discipline-edit-form');
    Route::post('/dupdate',  [\App\Http\Controllers\DisciplineController::class, 'update'])->name('secretary.discipline-update');

    Route::get('/course', [\App\Http\Controllers\CourseController::class, 'index'])->name('secretary.course-index');
    Route::post('/courses', [\App\Http\Controllers\CourseController::class, 'filtroCurso'])->name('secretary.course-filtro');
    Route::get('/course/create/form',  [\App\Http\Controllers\CourseController::class, 'createform'])->name('secretary.course-create-form');
    Route::post('/course/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('secretary.course-create');
    Route::get('/course/edit/form/{id?}',  [\App\Http\Controllers\CourseController::class, 'show'])->name('secretary.course-edit-form');
    Route::post('/course/update',  [\App\Http\Controllers\CourseController::class, 'update'])->name('secretary.course-update');
    Route::get('/course/add-discipline/{id?}',  [\App\Http\Controllers\CoursesDisciplineController::class, 'addform'])->name('secretary.course-add-form');
    Route::post('/course/add-discipline',  [\App\Http\Controllers\CoursesDisciplineController::class, 'add'])->name('secretary.course-add');
    Route::get('/course/remove-discipline/{disciplineid?}&{courseid?}',  [\App\Http\Controllers\CoursesDisciplineController::class, 'remove'])->name('secretary.course-remove');
    Route::get('/course/details/{id?}',  [\App\Http\Controllers\CourseController::class, 'detailspage'])->name('secretary.course-details');


    Route::get('/registration', [\App\Http\Controllers\RegistrationController::class, 'index'])->name('secretary.registration-index');
    Route::post('/registrations', [\App\Http\Controllers\RegistrationController::class, 'filtro'])->name('secretary.registration-filtro');
    Route::get('/registration/createform',  [\App\Http\Controllers\RegistrationController::class, 'createform'])->name('secretary.registration-create-form');
    Route::post('/registration/create', [\App\Http\Controllers\RegistrationController::class, 'create'])->name('secretary.registration-create');

    Route::get('/room', [\App\Http\Controllers\RoomController::class, 'index'])->name('secretary.room-index');
    Route::post('/rooms', [\App\Http\Controllers\RoomController::class, 'filtro'])->name('secretary.room-filtro');
    Route::get('/room/createform',  [\App\Http\Controllers\RoomController::class, 'createform'])->name('secretary.room-create-form');
    Route::post('/room/create', [\App\Http\Controllers\RoomController::class, 'create'])->name('secretary.room-create');
    Route::get('/room/updateform/{id?}',  [\App\Http\Controllers\RoomController::class, 'show'])->name('secretary.room-update-form');
    Route::post('/room/update', [\App\Http\Controllers\RoomController::class, 'update'])->name('secretary.room-update');

    Route::get('/class', [\App\Http\Controllers\ClassController::class, 'index'])->name('secretary.class-index');
    Route::post('/classes', [\App\Http\Controllers\ClassController::class, 'filtro'])->name('secretary.class-filtro');
    Route::get('/class/createform',  [\App\Http\Controllers\ClassController::class, 'createform'])->name('secretary.class-create-form');
    Route::post('/class/create', [\App\Http\Controllers\ClassController::class, 'create'])->name('secretary.class-create');
    Route::post('/class/addStudent', [\App\Http\Controllers\RegistrationsInClassesController::class, 'addStudent'])->name('secretary.add-student');
    Route::get('/class/StudentForm', [\App\Http\Controllers\RegistrationsInClassesController::class, 'addform'])->name('secretary.add-student-form');
    Route::post('/class/addTeacher', [\App\Http\Controllers\TeacherInClassesController::class, 'addTeacher'])->name('secretary.add-teacher');
    Route::get('/class/TeacherForm', [\App\Http\Controllers\TeacherInClassesController::class, 'addform'])->name('secretary.add-teacher-form');
    Route::get('/class/updateform/{id?}',  [\App\Http\Controllers\ClassController::class, 'show'])->name('secretary.class-update-form');
    Route::post('/class/update', [\App\Http\Controllers\ClassController::class, 'update'])->name('secretary.class-update');

    Route::get('/registration/addform',  [\App\Http\Controllers\RegistrationsInClassesController::class, 'addform'])->name('secretary.active.assign-registration-form');
    Route::get('/registration/add',  [\App\Http\Controllers\RegistrationsInClassesController::class, 'addRegistration'])->name('secretary.active.assign-registration');

    Route::get('/season', [\App\Http\Controllers\SeasonController::class, 'index'])->name('secretary.season-index');
    Route::post('/seasons', [\App\Http\Controllers\SeasonController::class, 'filtro'])->name('secretary.season-filtro');
    Route::get('/season/createform',  [\App\Http\Controllers\SeasonController::class, 'createform'])->name('secretary.season-create-form');
    Route::post('/season/create', [\App\Http\Controllers\SeasonController::class, 'create'])->name('secretary.season-create');
    Route::get('/season/updateform/{id?}',  [\App\Http\Controllers\SeasonController::class, 'show'])->name('secretary.season-update-form');
    Route::post('/season/update', [\App\Http\Controllers\SeasonController::class, 'create'])->name('secretary.season-update');

    //reltatórios
    Route::get('/extraction', [\App\Http\Controllers\ExportacaoController::class, 'index'])->name('secretary.extraction');
    Route::get('/extraction-attendance', [\App\Http\Controllers\ExportacaoController::class, 'exportFalseAttendances'])->name('secretary.extraction-faltas');
    Route::get('/extraction-final-score', [\App\Http\Controllers\ExportacaoController::class, 'exportFinishStudents'])->name('secretary.extraction-notas');
});

Route::prefix('/teacher')->group(function(){
   Route::get('/plano' , [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher.index');
   Route::post('/planos' , [\App\Http\Controllers\TeacherController::class, 'filtroHome'])->name('teacher.filtro-home');

    //lesson
    Route::get('/lesson/{id?}' , [\App\Http\Controllers\LessonController::class, 'index'])->name('teacher.lesson-index');
    Route::get('/lesson-add' , [\App\Http\Controllers\LessonController::class, 'addlesson'])->name('teacher.lesson-add');
    Route::get('/lesson/edit-form/{id?}' , [\App\Http\Controllers\LessonController::class, 'editForm'])->name('teacher.lesson-edit-form');
    Route::post('/lesson/edit}' , [\App\Http\Controllers\LessonController::class, 'edit'])->name('teacher.lesson-edit');

   //attendance
   Route::get('/attendance' , [\App\Http\Controllers\TeacherController::class, 'listClassesAttendance'])->name('teacher.attendance');
   Route::post('/attendances' , [\App\Http\Controllers\TeacherController::class, 'filtroAttendance'])->name('teacher.attendance-filtro');
   Route::get('/presence/form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsAttendance'])->name('teacher.attendance-form');
   Route::post('/presence/makepresence' , [\App\Http\Controllers\TeacherController::class, 'makeAttendance'])->name('teacher.attendance-make');

    //Score
   Route::get('/score' , [\App\Http\Controllers\TeacherController::class, 'listClassesScore'])->name('teacher.score');
   Route::post('/scores' , [\App\Http\Controllers\TeacherController::class, 'filtroScore'])->name('teacher.score-filtro');
   Route::get('/score/form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsScore'])->name('teacher.score-form');
   Route::post('/score/makescore' , [\App\Http\Controllers\TeacherController::class, 'makeScore'])->name('teacher.make-score');
   Route::get('/score/edit-form/{id?}' , [\App\Http\Controllers\TeacherController::class, 'listStudentsScoreEdit'])->name('teacher.score-list-form');
   Route::get('/score/StudentScore/{id?}&{classid?}' , [\App\Http\Controllers\TeacherController::class, 'editStudentScore'])->name('teacher.score-edit-form');
   Route::post('/score/StudentScore/Update' , [\App\Http\Controllers\TeacherController::class, 'updateStudentScore'])->name('teacher.score-update');
   Route::get('/score/AddStudentScore/{registrationClass?}&{classid?}' , [\App\Http\Controllers\TeacherController::class, 'createScoreForm'])->name('teacher.score-create-form');
   Route::post('/score/StudentScore/Create' , [\App\Http\Controllers\TeacherController::class, 'addStudentScore'])->name('teacher.score-create');
   Route::get('/fecharNota' , [\App\Http\Controllers\TeacherController::class, 'fecharNota'])->name('teacher.score-close-score');

   //Homework
   Route::get('/homework' , [\App\Http\Controllers\TeacherController::class, 'listClassesHomework'])->name('teacher.homework');
   Route::get('/homework/assigned/{id?}' , [\App\Http\Controllers\TeacherController::class, 'assignedHomeworkForm'])->name('teacher.homework-assigned');
   Route::post('/homework/create' , [\App\Http\Controllers\TeacherController::class, 'createHomework'])->name('teacher.homework-create');
});
