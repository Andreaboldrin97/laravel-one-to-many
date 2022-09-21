<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $myUser = new User();
        $myUser->name = 'root';
        $myUser->email = 'root@gmail.com';
        $myUser->password = Hash::make('root');
        $myUser->save();

        for ($i = 1; $i <= 10; $i++) {

            $newUser = new User();
            $newUser->name = $faker->userName();
            $newUser->email = $faker->unique()->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
