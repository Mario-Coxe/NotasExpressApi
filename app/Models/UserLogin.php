<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class  UserLogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'user_logins';
    
    protected $fillable = ['team_id', 'phone_number', 'password', 'type_user', 'is_active'];
}