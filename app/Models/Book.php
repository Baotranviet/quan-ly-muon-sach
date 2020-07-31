<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_code', 
        'book_name',
        'page_number',
        'author',
        'quantity'
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
