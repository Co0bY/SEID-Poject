<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportacaoController extends Controller
{
    public function index(){

        return view('secretary.extraction.index');
    }

    public function exportFalseAttendances(Request $request){

        dd($request);

        $query = DB::table("extracaofaltas");

        //wheres das datas ou outros wheres,
        if($request->initial_date) $query->where('day_of_attendance', '>', $request->initial_date);
        if($request->final_date) $query->where('day_of_attendance', '<', $request->final_date);
        if($request->registration) $query->where('registration', $request->registration);
        if($request->class_code) $query->where('class_code', $request->class_code);
        if($request->season_code) $query->where('season_code',$request->season_code);

        $faltas = $query->get();


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue("A1", "ID CHAMADA");
        $sheet->setCellValue("B1", "MATRÍCULA");
        $sheet->setCellValue("C1", "NOME DO ESTUDANTE");
        $sheet->setCellValue("D1", "CPF DO ESTUDANTE");
        $sheet->setCellValue("E1", "EMAIL DO ESTUDANTE");
        $sheet->setCellValue("F1", "CHAMADA");
        $sheet->setCellValue("G1", "DIA DA CHAMADA");
        $sheet->setCellValue("H1", "NOME DA TURMA");
        $sheet->setCellValue("I1", "CÓDIGO DA TURMA");
        $sheet->setCellValue("J1", "NOME DA DISCÍPLINA");
        $sheet->setCellValue("K1", "CÓDIGO DA DISCIPLINA");
        $sheet->setCellValue("L1", "NOME DO PERÍODO");
        $sheet->setCellValue("M1", "CÓDIGO DO PERÍODO");

        $c = 2;

        foreach($faltas as $falta){
            $datePTBR = strtotime($falta->day_of_attendance);
            $date = date("d/m/Y", $datePTBR);

            $sheet->setCellValue("A$c", $falta->id);
            $sheet->setCellValue("B$c", $falta->registration);
            $sheet->setCellValue("C$c", $falta)->student_name;
            $sheet->setCellValue("D$c", $falta->student_cpf);
            $sheet->setCellValue("E$c", $falta->student_email);
            $sheet->setCellValue("F$c", $falta->attendance);
            $sheet->setCellValue("G$c", $date);
            $sheet->setCellValue("H$c", $falta->class_name);
            $sheet->setCellValue("I$c", $falta->class_code);
            $sheet->setCellValue("J$c", $falta->discipline_name);
            $sheet->setCellValue("K$c", $falta->discipline_code);
            $sheet->setCellValue("L$c", $falta->season_name);
            $sheet->setCellValue("M$c", $falta->season_code);

            $c++;
        }

        $fileName = "extracaoFaltas" . ".xlsx";

        $writer = new Xlsx($spreadsheet);
        $writer->save($path = storage_path("app/public/temp/$fileName"));

        return Storage::url("temp/$fileName");
    }

    public function exportFinishStudents(Request $request){

        $query = DB::table("extracaonotasfinais");

        //wheres das datas ou outros wheres,
        if($request->registration) $query->where('registration', $request->registration);
        if($request->class_code) $query->where('class_code', $request->class_code);
        if($request->season_code) $query->where('season_code',$request->season_code);

        $notas = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue("A1", "ID REGISTRO");
        $sheet->setCellValue("B1", "MATRÍCULA");
        $sheet->setCellValue("C1", "NOME DO ESTUDANTE");
        $sheet->setCellValue("D1", "CPF DO ESTUDANTE");
        $sheet->setCellValue("E1", "EMAIL DO ESTUDANTE");
        $sheet->setCellValue("F1", "NOTA FINAL");
        $sheet->setCellValue("G1", "NOME DA TURMA");
        $sheet->setCellValue("H1", "CÓDIGO DA TURMA");
        $sheet->setCellValue("I1", "NOME DA DISCÍPLINA");
        $sheet->setCellValue("J1", "CÓDIGO DA DISCIPLINA");
        $sheet->setCellValue("K1", "NOME DO PERÍODO");
        $sheet->setCellValue("L1", "CÓDIGO DO PERÍODO");

        $c = 2;

        foreach($notas as $nota){
            $sheet->setCellValue("A$c", $nota->id);
            $sheet->setCellValue("B$c", $nota->registration);
            $sheet->setCellValue("C$c", $nota->student_name);
            $sheet->setCellValue("D$c", $nota->student_cpf);
            $sheet->setCellValue("E$c", $nota->student_email);
            $sheet->setCellValue("F$c", $nota->final_score);
            $sheet->setCellValue("G$c", $nota->class_name);
            $sheet->setCellValue("H$c", $nota->class_code);
            $sheet->setCellValue("I$c", $nota->discipline_name);
            $sheet->setCellValue("J$c", $nota->discipline_code);
            $sheet->setCellValue("K$c", $nota->season_name);
            $sheet->setCellValue("L$c", $nota->season_code);

            $c++;
        }

        $fileName = "extracaoNotasFinais" . ".xlsx";

        $writer = new Xlsx($spreadsheet);
        $writer->save($path = storage_path("app/public/temp/$fileName"));

        return Storage::url("temp/$fileName");
    }
}
