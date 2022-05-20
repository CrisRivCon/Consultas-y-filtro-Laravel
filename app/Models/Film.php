<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $primaryKey = 'film_id';
    protected $fillable = ['title', 'description'];

    //TODO=>Relaciones
    public function actores()
    {
        return $this->hasMany(Film_actor::class, 'film_id', 'film_id');
        //return $this->belongsToMany(Film_actor::class, 'film_actor');
    }
}
