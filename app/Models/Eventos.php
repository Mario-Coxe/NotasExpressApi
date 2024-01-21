<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Eventos extends Model
{
    use HasFactory;

    protected $fillable = ['is_active', 'photo', 'theme', 'data_time', 'description', 'academic_year_id'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function anosLetivos(): BelongsTo
    {
        return $this->belongsTo(AnosLetivos::class, 'academic_year_id');
    }
}
