<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Horarios extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'is_active', 'start_time', 'end_time', 'subjet_id', 'trimester_id', 'day_of_week'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function turmas(): BelongsTo
    {
        return $this->belongsTo(Turmas::class, 'class_id');
    }

    public function disciplinas(): BelongsTo
    {
        return $this->belongsTo(Disciplinas::class, 'subjet_id');
    }

    public function trimestres(): BelongsTo
    {
        return $this->belongsTo(Trimestres::class, 'trimester_id');
    }
}
