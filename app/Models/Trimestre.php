<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    use HasFactory;

    protected $table = 'trimestres';

    protected $fillable = ['trimestre'];

    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}
