<?php

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
            FacilitiesTableSeeder::class,
            MessagesTableSeeder::class,
            PromosTableSeeder::class,
            StatsTableSeeder::class,
            // ApartmentsTableSeeder::class,
        ]);
    }
}
