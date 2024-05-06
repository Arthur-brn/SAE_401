<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'language';

    protected $fillable = [
        'name',
    ];

    public function audioFilms()
    {
        return $this->belongsToMany(Film::class, 'audio_language', 'language_id', 'film_id');
    }

    public function subtitleFilms()
    {
        return $this->belongsToMany(Film::class, 'subtitle', 'language_id', 'film_id');
    }
}
