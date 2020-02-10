<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            Product::create([
                'cat_id' => $faker->numberBetween($min = 1, $max = 4),
                'product_name' => $faker->lastName,
                'price' => $faker->numberBetween($min = 100000, $max = 900000),
                'detail' => $faker->paragraph,
            ]);
        }
    }
}
