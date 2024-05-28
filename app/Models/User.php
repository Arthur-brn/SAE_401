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
        'address',
        'birthday',
        'status',
    ];

    public function filmLoans()
    {
        return $this->morphByMany(Film::class, 'loanable');
    }

    public function bookLoans()
    {
        return $this->morphByMany(Book::class, 'loanable');
    }

    public function filmReviews()
    {
        return $this->morphByMany(Film::class, 'reviewable');
    }

    public function bookReviews()
    {
        return $this->morphByMany(Book::class, 'reviewable');
    }
}
