<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\User::class)->create([
            'email'=>'john@doe.com'
        ]);

        factory(App\User::class)->create([
            'email'=>'jane@doe.com'
        ]);
    }
}
