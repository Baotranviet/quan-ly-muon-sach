<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'card_number',
        'book_code',
        'borrow_date',
        'pay_date',
    ];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_code', 'book_code');
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'card_number', 'card_number');
    }
}
