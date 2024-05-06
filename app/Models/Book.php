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
        return $this->belongsTo(Author::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function noticeUsers()
    {
        return $this->belongsToMany(User::class, 'notice', 'book_id', 'user_id');
    }

    public function loanUsers()
    {
        return $this->belongsToMany(User::class, 'loan', 'book_id', 'user_id');
    }
}
