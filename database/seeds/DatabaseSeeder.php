<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthorTableSeeder::class,
            BookTableSeeder::class,
            BorrowerTableSeeder::class,
            BorrowTableSeeder::class,
        ]);
    }
}
