<?php

namespace Database\Seeders;

use App\Models\Merk;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class
        ]);
        Merk::factory(100)->create();
        Product::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
