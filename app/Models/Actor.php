<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actor';
    protected $primaryKey = 'actor_id';
    protected $fillable = ['first_name', 'last_name', 'updated_at'];
    public $timestamps = false;

    //TODO=>Relaciones
    public function films()
    {
         return $this->hasMany(Film_actor::class,'actor_id','actor_id');
         //return $this->belongsToMany(Film::class, 'film_actor', 'actor_id', 'film_id', 'actor_id','film_id');
    }
}
