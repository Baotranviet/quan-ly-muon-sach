<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function index()
    {
        $paginate = config('setting.paginate');
        $borrows = Borrow::with(['book','borrower'])->paginate($paginate);

        return view('borrows.index', ['borrows' => $borrows]);
    }

    public function fromDayToDay()
    {
        return view('borrows.from_to_day');
    }

    public function getDay(Request $request)
    {
        $this->validate($request, [
            'form_day' => 'filled|date',
            'to_day' => 'filled|date|after:from_day',
        ]); 

        $from_day = $request->input('from_day');
        $to_day = $request->input('to_day');
        $output = '';
        
        $borrowers = DB::table('borrows')
                        ->select('borrowers.name','borrows.borrow_date')
                        ->join('borrowers', 'borrows.card_number', '=', 'borrowers.card_number')
                        ->whereBetween('borrows.borrow_date', [$from_day, $to_day])
                        ->groupBy('borrowers.name')
                        ->get();
                        
        if (!empty($borrowers)) {
            foreach ($borrowers as $borrower) {
                $output .= '<tr> 
                                <td> ' . $borrower->name  . '</td> 
                                <td> ' .  $borrower->borrow_date  . ' </td>
                            </tr>';
            }
        }   
        else{
            $output .= '<tr>
                            <td>No results as you expected</td>
                            <td>No results as you expected</td>
                        </tr>';
        }
        return $output;
    }
}
