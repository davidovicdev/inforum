<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = 201;
        $friends = 5000;
        $faker = Factory::create();
        $friendsArray = [];
        for ($i = 0; $i < $friends; $i++) {
            while (in_array(($userId = rand(1, $users)), $friendsArray));
            while (in_array(($frindId = rand(1, $users)), $friendsArray));
            if ($userId == $frindId) continue;
            DB::table("friends")->insert([
                "user_id" => $userId,
                "friend_id" => $frindId,
                "accepted" => 1,
                "created_at" => $faker->dateTimeThisDecade()
            ]);
            array_push($friendsArray, [$userId, $frindId]);
        }
    }
}
