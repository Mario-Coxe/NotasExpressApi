<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tarefas extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'professor_id', 'is_active', 'subject_id', 'due_date', 'description',];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function turmas(): BelongsTo
    {
        return $this->belongsTo(Turmas::class, "class_id");
    }

    public function professores(): BelongsTo
    {
        return $this->belongsTo(Professores::class, "professor_id");
    }

    public function disciplinas(): BelongsTo
    {
        return $this->belongsTo(Disciplinas::class, "subject_id");
    }
}
