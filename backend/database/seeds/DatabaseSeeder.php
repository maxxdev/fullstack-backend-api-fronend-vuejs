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
        // $this->call(UserSeeder::class);
        factory(App\Category::class, 5)->create()->each(function ($category) {
            $category->articles()->saveMany(factory(App\Article::class, 10)->make());
        });
    }
}
