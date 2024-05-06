<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $table = 'editor';

    protected $fillable = [
        'name',
        'picture',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
