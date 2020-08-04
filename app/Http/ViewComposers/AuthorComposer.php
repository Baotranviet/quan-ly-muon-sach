<?php
 namespace App\Http\ViewComposers;

 use App\Models\Author;
 use Illuminate\View\View;

 class AuthorComposer
 {
    public $authors;
    /**
     * Create a author composer.
    *
    * @return void
    */
    public function __construct()
    {
        $this->authors = Author::all();
    }

    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with('authors', end($this->authors));
    }
 }