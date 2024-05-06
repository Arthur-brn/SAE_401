<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioLanguage extends Model
{
    use HasFactory;

    protected $table = 'audio_language';

    protected $fillable = [
        'film_id',
        'language_id',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
