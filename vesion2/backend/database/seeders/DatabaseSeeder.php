<?php

namespace Database\Seeders;

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
        $this->call([
            // PostSeeder::class,
            // poststagSeeder::class,
            // tagsSeeder::class,
            User::class, w
            // VideosSeeder::class,
            // Add more seeders as needed
        ]);
    }
}
