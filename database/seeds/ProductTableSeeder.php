<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Product::truncate();

        foreach(range(1, 25) as $i) {
            Product::create([
                'name' => $faker->name,
                'category_id' => $i,
                'description' => $faker->description,
                'price' => $faker->price,
                'image' => $faker->image,
            ]);
        }
    }
}
