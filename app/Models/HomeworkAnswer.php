<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkAnswer extends Model
{
    use HasFactory;

    protected $attributes = [
        'score' => null,
        'revised' => null,
    ];
}
