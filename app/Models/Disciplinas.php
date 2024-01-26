<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Disciplinas extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'description', 'responsible_professor_id', 'course_id'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function professores(): BelongsTo
    {
        return $this->belongsTo(Professores::class, 'responsible_professor_id');
    }

    public function cursos(): BelongsTo
    {
        return $this->belongsTo(Cursos::class, 'course_id');
    }
}
