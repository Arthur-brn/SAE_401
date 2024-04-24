<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmLangage extends Model
{
    use HasFactory;

    protected $table = 'film_langage';

    protected $fillable = [
        'film_id',
        'langage_id',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function langage()
    {
        return $this->belongsTo(Langage::class);
    }
}
