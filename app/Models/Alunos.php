<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Hash;

class Alunos extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_id', 'incharge_id', 'relationship', 'bi', 'is_active', 'sex', 'address', 'email', 'phone_number', 'password', 'photo'];

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

    public function encarregados(): BelongsTo
    {
        return $this->belongsTo(Encarregados::class, "incharge_id");
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($student) {
            $userLogin = new UserLogin([
                'team_id' => $student->team_id,
                'phone_number' => $student->phone_number,
                'password' => Hash::make($student->password),
                'is_active' => $student->is_active,
                'type_user' => 'student', 
            ]);
            $userLogin->save();
        });
    }
}
