<?php

namespace Database\Seeders;

use App\Models\Videos;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Videos::factory()->count(100)->create();

    }
}
