<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            AdditionalDescriptionSeeder::class,
            UsersSeeder::class
        ];
        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
