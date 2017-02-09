<?php

use Illuminate\Database\Seeder;

use \Faker\Factory;
use \App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<100; $i++){
            $faker = Factory::create();

            $movie = new Movie;
            $movie->name = $faker->name;
            $movie->description = $faker->text;
            $movie->duration = $faker->randomNumber(2);
            $movie->imdb = $faker->randomFloat(1,1,10);
            $movie->publish = $faker->date("Y-m-d");
            $movie->save();

            $this->command->info($movie->name);
        }
    }
}
