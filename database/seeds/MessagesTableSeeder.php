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
        for ($i=0; $i < 15; $i++) {
            $new_message = new Message();

            $new_message->apartment_id = rand(9, 13);

            $new_message->message = $faker->paragraph();
            $new_message->email = $faker->email;

            $new_message->save();
        }
    }
}
