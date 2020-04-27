<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name'=>'Science Fiction', 'slug' => 'science-fiction', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Novel', 'slug' => 'novel', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Biography', 'slug' => 'biography', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Fantasy', 'slug' => 'fantasy', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Course book', 'slug' => 'course-book', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Art', 'slug' => 'art', 'created_at' => $now, 'updated_at' => $now],
            ['name'=>'Dictionay', 'slug' => 'dictionary', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
