<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;

class BorrowerORMController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::withCount('borrows')
                                ->groupBy('name')
                                ->get();

        return view('borrowers-orm.index', ['borrowers' => $borrowers]);
    }

    public function getToDay()
    {
        $current_date = date("Y-m-d");
        $borrowers = Borrower::with('borrows')
                        ->whereHas('borrows',function($query) use ($current_date){
                            $query->where('borrow_date', '=', "{$current_date}");
                        })->get();

        return view('borrowers-orm.today', ['borrowers' => $borrowers]);
    }

    public function getNotRefunded()
    {
        $borrowers = Borrower::with('borrows')
                        ->whereHas('borrows',function($query) {
                            $query->whereNull('pay_date');
                        })->get();

        return view('borrowers-orm.not-refunded', ['borrowers' => $borrowers]);
    }
}
