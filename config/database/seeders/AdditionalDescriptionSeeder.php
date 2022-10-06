<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class AdditionalDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "cities" => ["Belgrade", "New York", "Tokyo", "Paris", "London", "Berlin", "Moscow", "Zagreb", "Ljubljana", "Prague", "Canberra", "Melbourne", "Bangkok", "Peking", "Shagai", "Kairo", "Dubai", "Abu Dhabi"],
            "professions" => ["Artist", "Astronaut", "Chef", "Construction worker", "Firefighter", "Doctor", "Police", "Teacher", "Veterinarian", "Actor", "Pilot", "Nurse", "Engineer", "Barber", "Lifeguard", "Programmer", "Electrician", "Cashier", "Taxi driver", "Claner", "Model", "Dancer", "Singer", "Other"],
            "interested_in" => ["Man", "Woman"],
            "status_of_relationship" => ["Single", "Engaged", "Married"],
            "gender" => ["Male", "Female"],
            "eye_color" => ["Amber", "Blue", "Brown", "Gray", "Green", "Hazel"],
            "hair_color" => ["Black", "Red", "Brown", "Blonde", "Brunette", "Green", "Purple", "Gray", "Yellow", "White", "Bald"]
        ];
        foreach ($data as $tableName => $names) {
            foreach ($names as $name) {
                DB::table($tableName)->insert([
                    "name" => $name
                ]);
            }
        }
    }
}
