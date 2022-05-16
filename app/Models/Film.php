<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $fillable = ['title', 'description'];

    //TODO=>Relaciones
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actor');
    }
}
