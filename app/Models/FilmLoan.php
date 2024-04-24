<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmLoan extends Model
{
    use HasFactory;

    protected $table = 'film_loan';

    protected $fillable = [
        'user_id',
        'film_id',
        'loan_date',
        'return_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
