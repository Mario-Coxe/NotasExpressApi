<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UserLogin extends Model
{
    use HasFactory;

    protected $table = 'user_logins';
    
    protected $fillable = ['team_id', 'phone_number', 'password', 'type_user', 'is_active'];


    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }


    public function getAuthIdentifierName()
    {
        return 'id'; 
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
