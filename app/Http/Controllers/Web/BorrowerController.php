<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
}
