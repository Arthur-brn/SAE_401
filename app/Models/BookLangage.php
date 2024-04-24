<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLangage extends Model
{
    use HasFactory;

    protected $table = 'book_langage';

    protected $fillable = [
        'book_id',
        'langage_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function langage()
    {
        return $this->belongsTo(Langage::class);
    }
}
