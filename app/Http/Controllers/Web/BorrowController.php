<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function index()
    {
        $paginate = config('setting.paginate');
        $borrows = Borrow::with(['book','borrower'])->paginate($paginate);

        return view('borrows.index', ['borrows' => $borrows]);
    }
}
