<?php

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\Borrow;
use Faker\Generator as Faker;

class BorrowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $books = Book::pluck('book_code')->all();
        $borrowers = Borrower::pluck('card_number')->all();
        $i = 1;
        $j = 1;
        foreach (array_combine($books, $borrowers) as $book => $borrower) {
            Borrow::create([
                'card_number' => $borrower,
                'book_code' => $book,
                'borrow_date' => date("Y-m-d", strtotime( $j-- . "days", strtotime('2020-05-30'))),
                'pay_date' => date("Y-m-d", strtotime( $i++ . "days", strtotime('2020-05-31')))
            ]); 
        }
    }
}
