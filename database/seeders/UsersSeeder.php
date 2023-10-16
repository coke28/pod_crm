<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLevel;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUserLevel = new UserLevel();
        $demoUserLevel->name = "Admin";

        $demoUserLevel->save();
     

        $demoUser = new User();
        $demoUser->first_name = $faker->firstName;
        $demoUser->last_name = $faker->lastName;
        $demoUser->user_level_id = $demoUserLevel->id;
        $demoUser->email = 'demo@demo.com';
        $demoUser->password = Hash::make('demo');
        $demoUser->email_verified_at = now();
        $demoUser->save();

       


        // User::factory(10)->create();
    }
}
