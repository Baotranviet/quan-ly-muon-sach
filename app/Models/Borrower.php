<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'card_number',
        'name',
        'day_of_birth',
        'class'
    ];
    
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

}
