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
            UsersSeeder::class,
            CommentsSeeder::class,
            ForumsSeeder::class,
            // FriendsSeeder::class
        ];
        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
