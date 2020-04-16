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
        factory(App\User::class, 3)->create()->each(function($user){
            $user->threads()
            ->saveMany(
                factory(App\Thread::class, rand(1, 5))->make()
            )
            ->each(function($thread){
                $thread->replies()
                ->saveMany(
                    factory(App\Reply::class, rand(3, 7))->make()
                );
            });
        });
    }
}
