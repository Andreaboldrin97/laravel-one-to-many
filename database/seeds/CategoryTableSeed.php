<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoriesName = ['SPORT', 'NEWS', 'FOOD', 'HOBBY', 'HOME'];
        foreach ($categoriesName as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->color = $faker->hexColor();
            $newCategory->save();
        }
    }
}
