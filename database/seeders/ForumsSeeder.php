<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumsSeeder extends Seeder
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
        $forums = [
            "Relaxing forum" => [
                "Interesting links",
                "Curiosity from around the world",
                "Games",
                "Movies",
                "Music",
                "Funny images"
            ],
            "General topics" => ["Sex 18+", "Womens secret", "World nature", "Pets", "Tourism"],
            "Techinal part" => ["Mobile servicing", "Web development", "Digital art", "Gaming", "PC repair"],
            "Social topics" => ["Religion", "Politics", "Psychology", "Literature"],
            "Sport" => ["Football", "Basketball", "Waterpolo", "Tennis", "F1", "Grand Prix"]
        ];
        foreach ($forums as $forumName => $topics) {
            $forumId = DB::table("forums")->insertGetId([
                "name" => $forumName,
                "description" => $faker->text(50),
            ]);
            foreach ($topics as $topic) {
                $topicId = DB::table("topics")->insertGetId([
                    "forum_id" => $forumId,
                    "name" => $topic,
                    "created_at" => $faker->dateTimeThisDecade()
                ]);
                $postsPerTopic = rand(10, 30);
                for ($i = 0; $i < $postsPerTopic; $i++) {
                    DB::table("posts")->insert([
                        "topic_id" => $topicId,
                        "user_id" => rand(1, $users),
                        "text" => $faker->text(100),
                        "created_at" => $faker->dateTimeThisDecade()
                    ]);
                }
            }
        }
    }
}
