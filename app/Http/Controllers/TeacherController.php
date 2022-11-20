<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\TeacherInClasses;
use App\Models\RegistrationsInClasses;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Attendance;
use App\Models\CoursesDiscipline;
use App\Models\Discipline;
use App\Models\Score;
use App\Models\HomeWork;
use App\Models\LessonPlan;
use App\Models\Room;
use App\Models\StudentRegistrationInSubject;
use App\Models\StudentsInCourse;
use App\Services\Permissions;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    CONST PERMISSION = 'professor';

    public function index(Request $request){

        if (Permissions::check(self::PERMISSION));

        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if (isset($ligation)) {
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else {
            $classes = [];
        }

        return view('teachers.index', ['classes' => $classes]);
    }

    public function listClassesAttendance(Request $request){

        if (Permissions::check(self::PERMISSION));

        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.attendance', ['classes' => $classes]);
    }

    public function listClassesScore(Request $request){

        if (Permissions::check(self::PERMISSION));

        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.score', ['classes' => $classes]);
    }

    public function listStudentsAttendance($id){

        if (Permissions::check(self::PERMISSION));

        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $class =Classes::where('id', $id)->first();
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        $lessons = LessonPlan::where('class_id', $id)->where('notes', 'Faça uma chamada para adicionar')->get();
        }
        return view('teachers.attendance_form', ['students' => $students, 'class' => $class, 'lessons' => $lessons]);
    }

    public function makeAttendance(Request $request){

        if (Permissions::check(self::PERMISSION));

        // dd($request);
        $t = count($request['name']);
        for($i = 0; $i < $t; $i++){
            $registrationInClass = RegistrationsInClasses::where('id_registration', $request['id'][$i])->where('id_class', $request['classid'])->first();
            $attendance = new Attendance;
            $attendance->registration_in_class_id = $registrationInClass->id;
            $attendance->attendance = $request['attendance'][$i];
            $attendance->date_of_attendance = $request['date_of_attendance'];
            // dd($attendance);
            $attendance->save();
        }
        $lesson = LessonPlan::where('id', $request->lesson_id)->first();
        $lesson->content = $request->content;
        $lesson->notes = $request->notes;
        $lesson->save();
        return redirect()->route('teacher.attendance');
    }

    public function listStudentsScore($id){

        if (Permissions::check(self::PERMISSION));

        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $classid = $id;
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        }
        return view('teachers.score_form', ['students' => $students, 'classid' => $classid]);
    }

    public function makeScore(Request $request){
        // dd($request);
        $t = count($request['name']);
        for($i = 0; $i < $t; $i++){
            if(isset($request['score'][$i]))
            $registrationInClass = RegistrationsInClasses::where('id_registration', $request['id'][$i])->where('id_class', $request['classid'])->first();
            $attendance = new Score;
            $attendance->registration_in_class_id = $registrationInClass->id;
            $attendance->score = $request['score'][$i];
            $attendance->description = $request['description'];
            $attendance->save();
        }
        return redirect()->route('teacher.score');
    }

    public function listStudentsScoreEdit($id){
        $classesregistrations = RegistrationsInClasses::where('id_class', $id)->get();
        $students =[];
        $classid = $id;
        $i = 0;
        if(isset($classesregistrations)){
            foreach($classesregistrations as $classesregistration){
                $registration = Registration::where('id', $classesregistration->id)->first();
                $student = Student::where('id', $registration->student_id)->first();
                $students[$i] = $registration;
                $students[$i]->name = $student->name;
                $i++;
            }
        }
        return view('teachers.score_edit', ['students' => $students, 'classid' => $classid]);
    }

    public function editStudentScore($id, $classid){

        $registration = Registration::where('id', $id)->first();
        $classregistration = RegistrationsInClasses::where('id_class', $classid)->where('id_registration', $id)->first();
        $studentfocus = Student::where('id', $registration->student_id)->first();
        $scores = Score::where('registration_in_class_id', $classregistration->id)->get();
        $student = $registration;
        $student->name = $studentfocus->name;
        $registrationClass = $classregistration->id;
        $finalscore = $classregistration->final_score;
        return view('teachers.score_edit_form', ['student' => $student, 'scores' => $scores, 'classid' => $classid, 'registrationClass' => $registrationClass, 'finalscore' => $finalscore]);
    }

    public function updateStudentScore(Request $request){

        $t = count($request['id']);
        for($i = 0; $i < $t; $i++){
            $newscore = Score::where('id', $request['id'][$i])->first();
            $newscore->score = $request['score'][$i];
            $newscore->description = $request['description'][$i];
            $newscore->save();
        }
        return redirect()->route('teacher.score');
    }

    public function createScoreForm($registrationClass, $classid){
        $classregistration =  $classregistration = RegistrationsInClasses::where('id_class', $classid)->where('id_registration', $registrationClass)->first();
        $registration = Registration::where('id', $classregistration->id_registration)->first();
        $studentfocus = Student::where('id', $registration->student_id)->first();
        $student = $registration;
        $student->name = $studentfocus->name;

        return view('teachers.score_new', ['student' => $student, 'classid' => $classid, 'registrationClass' => $registrationClass]);
    }

    public function addStudentScore(Request $request){
        $score = new Score;
        $score->registration_in_class_id = $request->registrationClass;
        $score->score = $request->score;
        $score->description = $request->description;
        $score->save();

        return redirect()->route('teacher.score');
    }

    public function fecharNota(Request $request){
        $scores = Score::where('registration_in_class_id', $request->registrationClassId)->get();
        $finalScore = 0;
        if($request->metodo == "soma"){
            foreach($scores as $score){
                $finalScore = $finalScore + $score->score;
            }
        }
        if($request->metodo == "mediaAritimetica"){
            $quantidade = count($scores);
            foreach($scores as $score){
                $finalScore = $finalScore + $score->score;

            }
            $finalScore = $finalScore / $quantidade;
        }
        $registrationInClass = RegistrationsInClasses::where('id', $request->registrationClassId)->first();
        $registrationInClass->final_score = $finalScore;
        $registrationInClass->save();

        $registrationInCourse = StudentsInCourse::where('registration_id', $registrationInClass->id_registration)->first();
        $class = Classes::where('id', $registrationInClass->id_class)->first();
        $discipline = Discipline::where('id', $class->id_discipline)->first();
        $disciplinecourse = CoursesDiscipline::where('course_id', $registrationInCourse->course_id)->where('discipline_id', $discipline->id)->first();
        $subject = StudentRegistrationInSubject::where('students_in_courses_id', $registrationInCourse->id)
        ->where('courses_disciplines_id', $disciplinecourse->id )->first();
        if($finalScore > 6){
            $subject->score = $finalScore;
            $subject->save();
        }

        return redirect()->route('teacher.score');
    }

    public function listClassesHomework(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $classes = Classes::where('id', $ligation->id_class)->get();
        }
        else{
            $classes = [];
        }

        return view('teachers.homework_index', ['classes' => $classes]);
    }



    public function assignedHomeworkForm($id){

        return view('teachers.homework_assignment_form',['classid' => $id]);
    }

    public function createHomework(Request $request){

        // dd($request->all());
        $homework = new Homework;
        $homework->class_id = $request->classid;
        $homework->title = $request->title;
        $homework->content = $request->content;
        $path = $request->file('additional_file')->store('public/additional_files');
        $homework->additional_file = $path;
        if($request->score){
            $homework->score = $request->score;
        }
        $homework->save();
    }

    public function filtroHome(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $name = $request->name;
            $code_class = $request->code_class;
            $code_room = $request->code_room;

            $query = Classes::query();

            if($name != ""){
               $query->where('name', 'like', "%$name%");
            }
            if($code_class != ""){
                $query->where('code', 'like', "%$code_class%");
            }
            if($code_room != ""){
                $room = Room::where('code', 'like', "%$code_room%")->first();
                if(isset($student)){
                    $query->where('id_room', $room->id);
                }else{
                    $query->where('id_room', '');
                }
            }

            $classes = $query->orderByDesc('id')->paginate(10);
        }
        else{
            $classes = [];
        }

        return view('teachers.index', ['classes' => $classes]);
    }

    public function filtroScore(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $name = $request->name;
            $code_class = $request->code_class;
            $code_room = $request->code_room;

            $query = Classes::query();

            if($name != ""){
               $query->where('name', 'like', "%$name%");
            }
            if($code_class != ""){
                $query->where('code', 'like', "%$code_class%");
            }
            if($code_room != ""){
                $room = Room::where('code', 'like', "%$code_room%")->first();
                if(isset($student)){
                    $query->where('id_room', $room->id);
                }else{
                    $query->where('id_room', '');
                }
            }

            $classes = $query->orderByDesc('id')->paginate(10);
        }
        else{
            $classes = [];
        }

        return view('teachers.score', ['classes' => $classes]);
    }

    public function filtroAttendance(Request $request){
        $userid = $request->session()->get('id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $ligation = TeacherInClasses::where('id_teacher', $teacher->id)->first();
        if(isset($ligation)){
            $name = $request->name;
            $code_class = $request->code_class;
            $code_room = $request->code_room;

            $query = Classes::query();

            if($name != ""){
               $query->where('name', 'like', "%$name%");
            }
            if($code_class != ""){
                $query->where('code', 'like', "%$code_class%");
            }
            if($code_room != ""){
                $room = Room::where('code', 'like', "%$code_room%")->first();
                if(isset($student)){
                    $query->where('id_room', $room->id);
                }else{
                    $query->where('id_room', '');
                }
            }

            $classes = $query->orderByDesc('id')->paginate(10);
        }
        else{
            $classes = [];
        }

        return view('teachers.attendance', ['classes' => $classes]);
    }
}
