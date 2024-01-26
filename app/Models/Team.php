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

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }

    public function professores(): HasMany
    {
        return $this->hasMany(Professor::class);
    }

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }


    public function disciplinas(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }

    public function encarregados(): HasMany
    {
        return $this->hasMany(Encarregado::class);
    }

    
    public function trimestres(): HasMany
    {
        return $this->hasMany(Trimestre::class);
    }

    public function anos(): HasMany
    {
        return $this->hasMany(Anos::class);
    }



    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
