<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            User::create([
                'username' => $faker->username,
                'name' => $faker->name,
                'password' => bcrypt('123'),
                'email' => $faker->email
            ]);
        }
    }
}
