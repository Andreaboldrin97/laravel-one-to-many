<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 20; $i++) {
            $newPost = new Post();
            $newPost->author = $faker->userName();
            $newPost->title = $faker->realText(35);
            $newPost->description = $faker->paragraph(3, true);
            $newPost->image_url = $faker->imageUrl(350, 350, 'post');
            $newPost->sale_date = $faker->dateTimeThisYear();
            $newPost->save();
        }
    }
}
