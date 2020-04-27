<?php

use Illuminate\Database\Seeder;

class ThreadRepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('threads')->delete();
        \DB::table('replies')->delete();
        \DB::table('users')->delete();

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
