<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trimestres extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'start_date', 'end_date', 'academic_year_id'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function anosLetivos(): BelongsTo
    {
        return $this->belongsTo(AnosLetivos::class, 'academic_year_id');
    }
}
