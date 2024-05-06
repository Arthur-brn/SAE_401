<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $fillable = [
        'title',
        'picture',
        'director_id',
        'style',
        'age_limit',
        'summary',
        'duration',
        'year',
        'copy_number',
        'loan_number',
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'casting', 'film_id', 'actor_id');
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function audioLangages()
    {
        return $this->belongsToMany(Language::class, 'audio_language', 'film_id', 'language_id');
    }

    public function subtitleLangages()
    {
        return $this->belongsToMany(Language::class, 'subtitle', 'film_id', 'language_id');
    }

    public function noticeUsers()
    {
        return $this->belongsToMany(User::class, 'notice', 'film_id', 'user_id');
    }

    public function loanUsers()
    {
        return $this->belongsToMany(User::class, 'loan', 'film_id', 'user_id');
    }
}
