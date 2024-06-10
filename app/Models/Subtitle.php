<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtitle extends Model
{
    use HasFactory;

    protected $table = 'subtitle';

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function langage()
    {
        return $this->belongsTo(Language::class);
    }
}
