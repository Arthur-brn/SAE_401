<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $fillable = [
        'name',
        'duration',
        'director',
        'year',
        'age_limit',
        'summary',
        'loan_number',
        'is_booked',
        'is_borrowed',
        'picture',
        'copy_number',
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'casting', 'film_id', 'actor_id');
    }

    public function langages()
    {
        return $this->belongsToMany(Langage::class, 'film_langage', 'film_id', 'langage_id');
    }
}
