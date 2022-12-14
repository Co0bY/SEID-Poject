<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registration extends Model
{
    use HasFactory;

    public function student(): BelongsTo{
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function season(): BelongsTo{
        return $this->belongsTo(Season::class, 'season_id');
    }
}
