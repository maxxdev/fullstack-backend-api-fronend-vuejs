<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('categories')->insert([
            'name'=>Str::random(10),
        ]);*/
        factory(App\Category::class, 2)->create();
    }
}
