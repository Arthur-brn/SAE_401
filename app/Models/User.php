<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'birthday',
        'status',
    ];

    public function noticeFilms()
    {
        return $this->belongsToMany(Film::class, 'notice', 'user_id', 'film_id');
    }

    public function loanFilms()
    {
        return $this->belongsToMany(Film::class, 'loan', 'user_id', 'film_id');
    }

    public function noticeBooks()
    {
        return $this->belongsToMany(Book::class, 'notice', 'user_id', 'film_id');
    }

    public function loanBooks()
    {
        return $this->belongsToMany(Book::class, 'loan', 'user_id', 'film_id');
    }
}
