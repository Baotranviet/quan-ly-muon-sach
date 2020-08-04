<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_code', 
        'book_name',
        'page_number',
        'author_id',
        'quantity'
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
