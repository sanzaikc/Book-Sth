<?php

use Illuminate\Database\Seeder;

use App\User;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::class, 8)->create();
    }
}
