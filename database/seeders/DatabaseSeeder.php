<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/public/categories');
        Storage::deleteDirectory('/public/subcategories');
        Storage::deleteDirectory('/public/products');

        Storage::makeDirectory('/public/categories', '0777', true, true);
        Storage::makeDirectory('/public/subcategories', '0777', true, true);
        Storage::makeDirectory('/public/products', '0777', true, true);

        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);
    }
}
