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
            "General topics" => ["Sex", "Womens secret", "World nature", "Pets", "Tourism"],
            "Technical part" => ["Mobile servicing", "Web development", "Digital art", "Gaming", "PC repair"],
            "Social topics" => ["Religion", "Politics", "Psychology", "Literature"],
            "Sport" => ["Football", "Basketball", "Waterpolo", "Tennis", "F1", "Grand Prix"]
        ];
        $descriptions = [
            "Place where you can lay back and chill and discuss about various relaxing topics",
            "Your day to day life",
            "Having problems with techologies? You are in the right place",
            "Everyday topics can be found right here",
            "Are you a sport fan? Choose any topic with your favorite sport"
        ];
        $counter = 0;
        foreach ($forums as $forumName => $topics) {
            $forumId = DB::table("forums")->insertGetId([
                "name" => $forumName,
                "description" => $descriptions[$counter],
            ]);
            $counter++;
            foreach ($topics as $topic) {
                $topicId = DB::table("topics")->insertGetId([
                    "forum_id" => $forumId,
                    "name" => $topic,
                    "locked" => rand(0, 1),
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
