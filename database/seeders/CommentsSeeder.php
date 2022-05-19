<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = 201;
        for ($i = 0; $i < $users * 4; $i++) {
            $userId = rand(1, $users);
            $commentId = DB::table("comments")->insertGetId([
                "user_id" => $userId,
                "text" => $faker->text(100),
                "created_at" => $faker->dateTimeThisDecade()
            ]);
            while (in_array(($randomUserId = rand(1, $users)), [$userId]));
            DB::table("user_comments")->insert([
                "comment_id" => $commentId,
                "user_id" => $randomUserId,
            ]);
        }
    }
}
