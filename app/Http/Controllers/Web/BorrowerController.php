<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Borrower;
use App\Http\Requests\BorrowerStoreRequest;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = DB::table('borrowers')
                        ->select(array('borrowers.name', DB::raw('COUNT(borrows.card_number) as number_of_borrows')))
                        ->leftJoin('borrows', 'borrowers.card_number', '=', 'borrows.card_number')
                        ->groupBy('borrowers.name')
                        ->get();

        return view('borrowers.index', ['borrowers' => $borrowers]);
    }
    
    public function getToDay()
    {
        $current_date = date("Y-m-d");
        $borrowers = DB::table('borrowers')
                        ->select('*')
                        ->join('borrows', 'borrowers.card_number', '=', 'borrows.card_number')
                        ->where('borrows.borrow_date', '=', $current_date)
                        ->get();

        return view('borrowers.today', ['borrowers' => $borrowers]);
    }

    public function getNotRefunded()
    {
        $borrowers = DB::table('borrowers')
                        ->select('*')
                        ->join('borrows', 'borrowers.card_number', '=', 'borrows.card_number')
                        ->whereNull('pay_date')
                        ->get();
        
        return view('borrowers.not-refunded', ['borrowers' => $borrowers]);
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(BorrowerStoreRequest $request)
    {
        $borrower = $request->all();
        Borrower::create($borrower);

        return redirect()->back()->with('create-borrower-success', 'Create Borrower Success');
    }

}
