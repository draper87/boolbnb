<?php

use Illuminate\Database\Seeder;
use App\Stat;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            $new_stat = new Stat();
            $new_stat->apartment_id = rand(9, 13);
            $new_stat->save();
        }
    }
}
