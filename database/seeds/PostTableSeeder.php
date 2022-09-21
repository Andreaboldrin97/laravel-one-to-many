<?php

use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::all();
        $category = Category::all();

        for ($i = 1; $i <= 20; $i++) {
            $newPost = new Post();
            $newPost->category_id = $faker->randomElement($category)->id;
            $newPost->user_id = $faker->randomElement($user)->id;
            $newPost->title = $faker->realText(35);
            $newPost->description = $faker->paragraph(3, true);
            $newPost->image_url = $faker->imageUrl(350, 350, 'post');
            $newPost->sale_date = $faker->dateTimeThisYear();
            $newPost->save();
        }
    }
}
