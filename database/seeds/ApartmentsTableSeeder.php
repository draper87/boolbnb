<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $array_title = [
            'Ampio bilocale',
            'Grazioso appartamento ben servito',
            'Villa rustica',
            'Appartamento moderno',
            'Trilocale in centro',
            'Rifugio romantico',
            'Baita con camino',
            'Loft con jacuzzi',
            'Tenuta campagnola',
            'Bettola underground',
        ];

        $array_addresses = [
            'Via Rossini 19 Milano',
            'Via Garibaldi 55 Bologna',
            'Via Manzoni 46 Roma',
            'Via Mazzini 88 Brescia',
            'Via Galileo Galilei 45 Andalo',
            'Via Giotto 11 Livigno',
            'Via Michelangelo 151 Caserta',
            'Via Gennaro 74 Napoli',
            'Via Napoleone 56 Palermo',
            'Via Cavour 55 Como',
        ];

        for ($i=0; $i < 10; $i++) {
            $new_apartment = new Apartment();
            $new_apartment->title = $array_title[$i];
            $new_apartment->rooms = rand(1, 9);
            $new_apartment->beds = rand(1, 5);
            $new_apartment->bathrooms = rand(1, 3);
            $new_apartment->square = rand(50, 200);
            $new_apartment->user_id = rand(3, 7);
            $new_apartment->image_path = $faker->imageUrl(800, 600, 'city');
            $new_apartment->address = $array_addresses[$i];
            $new_apartment->longitude = $faker->longitude();
            $new_apartment->latitude = $faker->latitude();
            $new_apartment->visible = true;

            $new_apartment->save();
            $new_apartment->facilities()->attach(rand(1, 6));
        }
    }
}
