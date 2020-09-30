<?php

use Illuminate\Database\Seeder;
use App\Promo;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_promo = [
            'promo24',
            'promo72',
            'promo144',
        ];

        $array_price = [
            2.99,
            5.99,
            9.99,
        ];

        $array_timing = [
            24,
            72,
            144,
        ];

        for ($i=0; $i < 3; $i++) {
            $new_promo = new Promo();
            $new_promo->name = $array_promo[$i];
            $new_promo->price = $array_price[$i];
            $new_promo->timing = $array_timing[$i];

            $new_promo->save();
        }
    }
}
