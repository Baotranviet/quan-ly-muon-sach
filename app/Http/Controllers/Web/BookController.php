<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Book\BookRepositoryInterface;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = config('setting.paginate');
        $books = $this->bookRepo->paginate('created_at', 'DESC', $paginate);

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rows = $request->input('rows');

        foreach ($rows as $row) {
            $book = array (
                'book_code' => $row['book_code'],
                'book_name' => $row['book_name'],
                'page_number' => $row['page_number'],
                'quantity' => $row['quantity'],
                'author' => $row['author'],
            );
            $this->bookRepo->create($book);
        }


        return redirect()->back()->with('create-book-success', 'Create Book Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookRepo->findOrFail($id);

        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $book = $request->all();
        $this->bookRepo->update($id, $book);

        return redirect()->back()->with('update-book-success', 'Update Book Success');
    }
    
    public function deleteMany(Request $request)
    {
        $arr_book_id = $request->input('id');
        $book = Book::whereIn('id',$arr_book_id);
        if ($book->delete()) {
            echo "Deleted";
        }
    }
}
