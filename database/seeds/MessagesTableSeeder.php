<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
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

        $array_messaggi = [
           'Buongiorno, vorrei maggiori informazioni in merito all appartamento',
            'Salve, è ancora disponibile l appartamento?',
            'La villa quante stanze ha?',
            'E possibile portare un animale?',
            'Si puo fumare dentro l appartamento?',
            'Da quando sarebbe disponibile?',
            'Quali garanzie richiedete per entrare nel vostro apparamento?',
            'Quali pagamenti accettate?',
            'E situato vicino ai mezzi pubblici?',
        ];


        for ($i=0; $i < 70; $i++) {
            $new_message = new Message();

            $new_message->apartment_id = rand(51, 99);

            $new_message->message = $array_messaggi[rand(0,8)];
            $new_message->email = $faker->email;
            $new_message->created_at = rand_date('2019-01-01 00:00:00', '2020-10-09 00:00:00');
            $new_message->save();
        }
    }
}
