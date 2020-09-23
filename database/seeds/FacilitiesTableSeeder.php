<?php

use Illuminate\Database\Seeder;
use App\Facility;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_facilities = [
            'wifi',
            'posto macchina',
            'piscina',
            'portineria',
            'sauna',
            'vista mare',
        ];

        for ($i=0; $i < 6; $i++) {
            $new_facility = new Facility();
            $new_facility->facility = $array_facilities[$i];
            $new_facility->save();
        }
    }
}
