<?php

namespace Database\Seeders;

use ClaimsTableSeeder;
use Database\Seeders\CountiesTableSeeder;
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
        $this->call([
            CountiesTableSeeder::class,
            ScopeOfWorkSeeder::class,
            PerilTableSeeder::class,
        ]);
    }
}
