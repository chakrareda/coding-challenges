<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Factory::create();

        Category::truncate();

        foreach(range(1, 25) as $i) {
            Category::create([
                'name' => $faker->name,
                'parent_id' => $i,
            ]);
        }
    }
}
