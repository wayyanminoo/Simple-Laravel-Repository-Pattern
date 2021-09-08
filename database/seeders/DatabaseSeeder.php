<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Item;
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
        // \App\Models\User::factory(10)->create();
        Customer::factory(30)->create();
        Item::factory(50)->create();
        Book::factory(100)->create();
    }
}
