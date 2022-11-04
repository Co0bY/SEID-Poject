<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classes extends Model
{
    protected $table = 'classes';
    use HasFactory;

    /**
     * Get the user that owns the Classes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, 'id_season');
    }

    public function disicpline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'id_discipline');
    }
}
