<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    protected $fillable = [
        'title',
        'author_id',
        'editor',
        'style',
        'page_number',
        'edition_date',
        'loan_number',
        'type',
        'summary',
        'is_booked',
        'is_borrowed',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
