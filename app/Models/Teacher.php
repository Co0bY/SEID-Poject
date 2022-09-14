<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'cpf',
        'name',
        'email',
        'address',
        'birth_date',
        'picture',
    ];
}
