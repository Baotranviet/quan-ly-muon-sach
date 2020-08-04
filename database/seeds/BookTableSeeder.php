<?php

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Generator as Faker;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i <= 50; $i++) { 
            Book::create([
                'book_code' => "TN-" . $i ,
                'book_name' => $faker->text($maxNbChars = 50),
                'page_number' => 111,
                'quantity' => 20,
                'author_id' => $i
            ]);
        }
    }
}
