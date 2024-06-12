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
        'picture',
        'author_id',
        'editor_id',
        'language_id',
        'style',
        'type',
        'summary',
        'page_number',
        'edition_year',
        'copy_number',
        'loan_number',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class, 'editor_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function loans()
    {
        return $this->morphMany(Loan::class, 'loanable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
