<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = ['theme', 'team_id', 'image', 'data_day', 'description'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
