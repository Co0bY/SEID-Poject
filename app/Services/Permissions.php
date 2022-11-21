<?php

namespace App\Services;

use App\Models\ForeignPerson;
use App\Models\LegalPerson;
use App\Models\NaturalPerson;
use App\Models\PriceList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Permissions {
    public static function check($permission) {

        switch (session('type_of_user')) {

            case 1:
                return TRUE;
                break;

            // SECRETÁRIO
            case 2:
                switch ($permission) {
                    case 'cursos':
                        return TRUE;
                        break;

                    case 'usuarios':
                        return TRUE;
                        break;

                    case 'disciplinas':
                        return TRUE;
                        break;

                    case 'matriculas':
                        return TRUE;
                        break;

                    case 'salas':
                        return TRUE;
                        break;

                    case 'turmas':
                        return TRUE;
                        break;

                    case 'periodos':
                        return TRUE;
                        break;

                    case 'relatorios':
                        return TRUE;
                        break;

                    default:
                        header('Location: /secretary/home');
                        break;
                }
                break;

            // PROFESSOR
            case 4:
                switch ($permission) {
                    case 'fazer-chamada':
                        return TRUE;
                        break;

                    case 'notas':
                        return TRUE;
                        break;

                    case 'atribuir-atividades':
                        return TRUE;
                        break;

                    case 'professor':
                        return TRUE;
                        break;

                    default:
                        header('Location: /teacher/plano');
                        break;
                }

                break;

            default:
                return redirect('/');
                break;
        }

    }
}
