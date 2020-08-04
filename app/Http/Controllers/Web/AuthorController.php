<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Repositories\Author\AuthorRepositoryInterface;

class AuthorController extends Controller
{
    protected $authorRepo;

    public function __construct(AuthorRepositoryInterface $authorRepo)
    {
        $this->authorRepo = $authorRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = config('setting.paginate');
        $authors = $this->authorRepo->paginate('created_at', 'DESC', $paginate);

        return view('authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStoreRequest $request)
    {
        $author = $request->all();
        $this->authorRepo->create($author);

        return redirect()->back()->with('create-author-success', 'Create Author Success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, $id)
    {
        $author = $request->all();
        if ($this->authorRepo->update($id, $author)) {
            return $author;
        }
    }

    public function deleteAuthor(Request $request)
    {
        $arr_author_id = $request->input('id');
        $author = Author::whereIn('id',$arr_author_id);
        if ($author->delete()) {
            echo "Deleted";
        }
    }

}
