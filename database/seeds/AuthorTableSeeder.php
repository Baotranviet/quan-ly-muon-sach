<?php

use Illuminate\Database\Seeder;
use App\Models\Author;
use Faker\Generator as Faker;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i <= 50; $i++) { 
            Author::create([
                'name' => $faker->name
            ]);
        }
    }
}
