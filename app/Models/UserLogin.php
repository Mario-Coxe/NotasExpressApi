<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UserLogin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_login';
    
    protected $fillable = ['team_id', 'telefone', 'password', 'type_user', 'is_active'];


    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }


    public function getAuthIdentifierName()
    {
        return 'id'; // ou o nome da chave primária na tabela, se for diferente de 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
