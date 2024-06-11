<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'review_content',
        'review_mark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
