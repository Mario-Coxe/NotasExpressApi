<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function anosLetivos(): HasMany
    {
        return $this->HasMany(AnosLetivos::class);
    }

    public function trimestres(): HasMany
    {
        return $this->HasMany(Trimestres::class);
    }

    public function professores(): HasMany
    {
        return $this->HasMany(Professores::class);
    }


    public function cursos(): HasMany
    {
        return $this->HasMany(Cursos::class);
    }

    public function disciplinas(): HasMany
    {
        return $this->HasMany(Disciplinas::class);
    }

    public function turmas(): HasMany
    {
        return $this->HasMany(Turmas::class);
    }

    public function horarios(): HasMany
    {
        return $this->HasMany(Horarios::class);
    }

    public function calendarios(): HasMany
    {
        return $this->HasMany(Calendarios::class);
    }

    public function eventos(): HasMany
    {
        return $this->HasMany(Eventos::class);
    }

    public function encarregados(): HasMany
    {
        return $this->HasMany(Encarregados::class);
    }

    public function alunos(): HasMany
    {
        return $this->HasMany(Alunos::class);
    }

    public function tarefas(): HasMany
    {
        return $this->HasMany(Tarefas::class);
    }

    public function user_login(): HasMany
    {
        return $this->HasMany(Tarefas::class);
    }
}
