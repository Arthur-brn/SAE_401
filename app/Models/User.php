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
    ];

    public function bookBookings()
    {
        return $this->hasMany(BookBooking::class);
    }

    public function filmBookings()
    {
        return $this->hasMany(FilmBooking::class);
    }

    public function bookLoans()
    {
        return $this->hasMany(BookLoan::class);
    }

    public function filmLoans()
    {
        return $this->hasMany(FilmLoan::class);
    }

    public function bookNotices()
    {
        return $this->hasMany(BookNotice::class);
    }

    public function filmNotices()
    {
        return $this->hasMany(FilmNotice::class);
    }
}
