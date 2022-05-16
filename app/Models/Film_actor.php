<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film_actor extends Model
{
    use HasFactory;
    protected $table = 'film_actor';
    //protected $fillable = ['actor', 'description'];
    //TODO=>Relaciones
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id','film_id');
    }
    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id','actor_id');
    }

}
