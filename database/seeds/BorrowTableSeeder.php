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
        
        foreach ($books as $book_code) {
            foreach ($borrowers as $card_number) {
                Borrow::create([
                    'card_number' => $card_number,
                    'book_code' => $book_code,
                    'borrow_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'pay_date' => $faker->date($format = 'Y-m-d', $max = 'now')
                ]); 
            }
        }
    }
}
