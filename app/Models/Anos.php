<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anos extends Model
{
    use HasFactory;

    protected $table = 'anos';

    protected $fillable = ['ano'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}
