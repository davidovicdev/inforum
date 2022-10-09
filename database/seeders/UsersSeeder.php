<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowCount = [
            "genders" => 2,
            "cities" => 18,
            "professions" => 24,
            "interested_in" => 2,
            "status_of_relationship" => 3,
            "eye_color" => 6,
            "hair_color" => 11
        ];
        DB::table("users")->insert([
            "gender_id" => 1,
            "city_id" => 1,
            "eye_color_id" => 5,
            "hair_color_id" => 3,
            "interested_in_id" => 2,
            "status_of_relationship_id" => null,
            "profession_id" => 16,
            "username" => "admin",
            "email" => "admin@gmail.com",
            "password" => md5("pass123"),
            "is_admin" => 1,
            "is_active" => 1,
            "avatar" =>  null,
            "about_me_description" => null,
            "date_of_birth" => "1999-07-27 11:00:00",
            "phone" => "0603707992",
            "facebook" => "https://www.facebook.com/settings?tab=account&section=username",
            "twitter" => null,
            "linkedin" => "https://www.linkedin.com/in/matija-davidovic-6994a2236/",
            "instagram" => null,
            "created_at" => Carbon::now(),
        ]);
        DB::table("users")->insert([
            "gender_id" => 1,
            "city_id" => 1,
            "eye_color_id" => 5,
            "hair_color_id" => 3,
            "interested_in_id" => 2,
            "status_of_relationship_id" => null,
            "profession_id" => 16,
            "username" => "admin2",
            "email" => "admin2@gmail.com",
            "password" => md5("pass123"),
            "is_admin" => 1,
            "is_active" => 1,
            "avatar" =>  null,
            "about_me_description" => null,
            "date_of_birth" => "1999-07-27 11:00:00",
            "phone" => "0603707994",
            "facebook" => "https://www.facebook.com/settings?tab=account&section=username",
            "twitter" => null,
            "linkedin" => "https://www.linkedin.com/in/matija-davidovic-6994a2236/",
            "instagram" => null,
            "created_at" => Carbon::now(),
        ]);
        DB::table("users")->insert([
            "gender_id" => 1,
            "city_id" => 1,
            "eye_color_id" => 5,
            "hair_color_id" => 3,
            "interested_in_id" => 2,
            "status_of_relationship_id" => null,
            "profession_id" => 16,
            "username" => "admin3",
            "email" => "admin3@gmail.com",
            "password" => md5("pass123"),
            "is_admin" => 1,
            "is_active" => 1,
            "avatar" =>  null,
            "about_me_description" => null,
            "date_of_birth" => "1999-07-27 11:00:00",
            "phone" => "0603707294",
            "facebook" => "https://www.facebook.com/settings?tab=account&section=username",
            "twitter" => null,
            "linkedin" => "https://www.linkedin.com/in/matija-davidovic-6994a2236/",
            "instagram" => null,
            "created_at" => Carbon::now(),
        ]);
        DB::table("users")->insert([
            "gender_id" => 1,
            "city_id" => 1,
            "eye_color_id" => 5,
            "hair_color_id" => 3,
            "interested_in_id" => 2,
            "status_of_relationship_id" => null,
            "profession_id" => 16,
            "username" => "admin4",
            "email" => "admin4@gmail.com",
            "password" => md5("pass123"),
            "is_admin" => 1,
            "is_active" => 1,
            "avatar" =>  null,
            "about_me_description" => null,
            "date_of_birth" => "1999-07-27 11:00:00",
            "phone" => "06013707994",
            "facebook" => "https://www.facebook.com/settings?tab=account&section=username",
            "twitter" => null,
            "linkedin" => "https://www.linkedin.com/in/matija-davidovic-6994a2236/",
            "instagram" => null,
            "created_at" => Carbon::now(),
        ]);
        DB::table("users")->insert([
            "gender_id" => 1,
            "city_id" => 1,
            "eye_color_id" => 5,
            "hair_color_id" => 3,
            "interested_in_id" => 2,
            "status_of_relationship_id" => null,
            "profession_id" => 16,
            "username" => "admin5",
            "email" => "admin5@gmail.com",
            "password" => md5("pass123"),
            "is_admin" => 1,
            "is_active" => 1,
            "avatar" =>  null,
            "about_me_description" => null,
            "date_of_birth" => "1999-07-27 11:00:00",
            "phone" => "0123707994",
            "facebook" => "https://www.facebook.com/settings?tab=account&section=username",
            "twitter" => null,
            "linkedin" => "https://www.linkedin.com/in/matija-davidovic-6994a2236/",
            "instagram" => null,
            "created_at" => Carbon::now(),
        ]);

        $faker = Factory::create();
        $notNull = 80;
        for ($i = 0; $i < 200; $i++) {
            DB::table("users")->insert([
                "gender_id" => rand(1, $rowCount["genders"]),
                "city_id" => $faker->boolean($notNull) ? rand(1, $rowCount["cities"]) : null,
                "eye_color_id" => $faker->boolean($notNull) ? rand(1, $rowCount["eye_color"]) : null,
                "hair_color_id" => $faker->boolean($notNull) ? rand(1, $rowCount["hair_color"]) : null,
                "interested_in_id" => $faker->boolean($notNull) ? rand(1, $rowCount["interested_in"]) : null,
                "status_of_relationship_id" => $faker->boolean($notNull) ? rand(1, $rowCount["status_of_relationship"]) : null,
                "profession_id" => $faker->boolean($notNull) ? rand(1, $rowCount["professions"]) : null,
                "username" => $faker->unique()->userName,
                "email" => $faker->unique()->email,
                "password" => md5("pass123"),
                "is_admin" => 0,
                "is_active" => rand(0, 1),
                "avatar" => $faker->boolean($notNull) ? $faker->imageUrl : null,
                "about_me_description" => $faker->boolean($notNull) ? $faker->text : null,
                "date_of_birth" => $faker->boolean($notNull) ? $faker->date : null,
                "phone" => $faker->boolean($notNull) ? $faker->phoneNumber : null,
                "facebook" => $faker->boolean($notNull) ? $faker->phoneNumber : null,
                "twitter" => $faker->boolean($notNull) ? $faker->url : null,
                "linkedin" => $faker->boolean($notNull) ? $faker->url : null,
                "instagram" => $faker->boolean($notNull) ? $faker->url : null,
                "created_at" => $faker->dateTimeThisDecade(),
            ]);
        }
    }
}
