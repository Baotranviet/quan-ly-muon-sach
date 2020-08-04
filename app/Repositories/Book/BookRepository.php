<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function getModel()
    {
        return Book::class;
    }
    
    public function with($model_related = [], $paginate)
    {
        return Book::with($model_related)->paginate($paginate);
    }
}