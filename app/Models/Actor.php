<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actor';

    protected $fillable = [
        'name',
        'picture',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'casting', 'actor_id', 'film_id');
    }
}
