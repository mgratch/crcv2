<?php

namespace Database\Seeders;

use App\Models\Traffic;
use App\Models\Trucking;
use App\Models\User;
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
        Traffic::factory(1000)->create();
        Trucking::factory(1000)->create();
        User::factory(50)->create();
    }
}
