<?php

use Illuminate\Database\Seeder;
use App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->command->ask("Film İsmi ?");
        //$this->command->error("Hata Mesajı");
        //$this->command->info("Bilgi Mesajı");
        // $this->call(UsersTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
    }
}
