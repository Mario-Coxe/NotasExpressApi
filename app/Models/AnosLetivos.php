<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class AnosLetivos extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'start_date', 'end_date'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
