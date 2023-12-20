<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;
use App\Models\UserLogin;


class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'bi', 'telefone', 'password', 'foto', 'status'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($aluno) {
            // Crie um registro correspondente na tabela user_app
            $userLogin = new UserLogin([
                'team_id' => $aluno->team_id,
                'telefone' => $aluno->telefone,
                'password' => Hash::make($aluno->password),
                'is_active' => $aluno->status,
                'type_user' => 'aluno', // Defina o type_user como 'aluno'
            ]);
            $userLogin->save();
        });
    }
}
