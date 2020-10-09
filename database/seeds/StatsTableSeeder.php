<?php

use Illuminate\Database\Seeder;
use App\Stat;
use Carbon\Carbon;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        function rand_date($min_date, $max_date) {
            /* Gets 2 dates as string, earlier and later date.
               Returns date in between them.
            */

            $min_epoch = strtotime($min_date);
            $max_epoch = strtotime($max_date);

            $rand_epoch = rand($min_epoch, $max_epoch);

            return date('Y-m-d H:i:s', $rand_epoch);
        }

        for ($i = 0; $i < 10000; $i++) {
            $new_stat = new Stat();

            $new_stat->created_at = rand_date('2019-01-01 00:00:00', '2020-10-09 00:00:00');
            $new_stat->apartment_id = rand(51, 99);
            $new_stat->save();
        }
    }
}
