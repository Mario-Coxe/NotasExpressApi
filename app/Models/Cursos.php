<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'description', 'responsible_professor_id', 'academic_year_id'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function professores(): BelongsTo
    {
        return $this->belongsTo(Professores::class, 'responsible_professor_id');
    }

    public function anosLetivos(): BelongsTo
    {
        return $this->belongsTo(AnosLetivos::class, 'academic_year_id');
    }
}
