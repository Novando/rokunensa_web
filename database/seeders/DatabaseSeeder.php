<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Stock::factory(100)->create();
        \App\Models\Rating::factory(100)->create();
    }
}
