<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loan';

    protected $fillable = [
        'user_id',
        'loanable_type',
        'loanable_id',
        'booking_number',
        'start_date',
        'status'
    ];

    public function loanable()
    {
        return $this->morphTo();
    }

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
