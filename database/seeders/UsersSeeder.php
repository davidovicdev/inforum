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
        $faker = Factory::create();
        $chanceAgainstNull = 80;
        for ($i = 0; $i < 2000; $i++) {
            DB::table("users")->insert([
                "gender_id" => rand(1, $rowCount["genders"]),
                "city_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["cities"]) : null,
                "eye_color_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["eye_color"]) : null,
                "hair_color_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["hair_color"]) : null,
                "interested_in_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["interested_in"]) : null,
                "status_of_relationship_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["status_of_relationship"]) : null,
                "profession_id" => $faker->boolean($chanceAgainstNull) ? rand(1, $rowCount["professions"]) : null,
                "username" => $faker->unique()->userName,
                "email" => $faker->unique()->email,
                "password" => md5("pass123"),
                "is_admin" => 0,
                "is_active" => rand(0, 1),
                "avatar" => $faker->boolean($chanceAgainstNull) ? $faker->imageUrl : null,
                "about_me_description" => $faker->boolean($chanceAgainstNull) ? $faker->text : null,
                "date_of_birth" => $faker->boolean($chanceAgainstNull) ? $faker->date : null,
                "phone" => $faker->boolean($chanceAgainstNull) ? $faker->phoneNumber : null,
                "facebook" => $faker->boolean($chanceAgainstNull) ? $faker->phoneNumber : null,
                "twitter" => $faker->boolean($chanceAgainstNull) ? $faker->url : null,
                "linkedin" => $faker->boolean($chanceAgainstNull) ? $faker->url : null,
                "instagram" => $faker->boolean($chanceAgainstNull) ? $faker->url : null,
                "created_at" => $faker->dateTime(),
            ]);
        }
    }
}
