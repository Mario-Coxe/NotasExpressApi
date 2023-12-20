<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Encarregado extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'bi', 'telefone', 'password', 'status', 'aluno_id', 'foto'];
    
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
