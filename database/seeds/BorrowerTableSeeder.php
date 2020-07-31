<?php

use Illuminate\Database\Seeder;
use App\Models\Borrower;
use Faker\Generator as Faker;

class BorrowerTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $class = [
            '10A',
            '10B',
            '10C',
            '10D',
            '11A',
            '11B',
            '11C',
            '11D',
            '12A',
            '12B',
            '12C',
            '12D'
        ];
        
        for ($i=1; $i <= 50; $i++) { 
            $value = $class[array_rand($class)];
            
            Borrower::create([
                'card_number' => "TV-" . $i ,
                'name' => $faker->name,
                'day_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'class' => $value,
            ]);
        }
    }
}
