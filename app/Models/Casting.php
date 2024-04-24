<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    use HasFactory;

    protected $table = 'casting';

    protected $fillable = [
        'actor_id',
        'film_id',
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
