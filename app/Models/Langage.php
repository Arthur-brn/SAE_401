<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langage extends Model
{
    use HasFactory;

    protected $table = 'langage';

    protected $fillable = [
        'name',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_langage', 'langage_id', 'film_id');
    }

    public function subtitles()
    {
        return $this->hasMany(Subtitle::class);
    }
}
