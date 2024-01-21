<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professores extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'sex', 'address', 'email', 'phone_number', 'password', 'photo'];

    /*
    protected $hidden = [
        'password',
    ];
    */

    protected $casts = [
        'password' => 'hashed',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
