<?php

namespace Database\Seeders;

use App\Models\poststags;
use Illuminate\Database\Seeder;

class poststagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        poststags::factory()->count(1000)->create();

    }
}
