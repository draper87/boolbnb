<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Apartment;
use Carbon\Carbon;


class SearchController extends Controller
{
    public function index(Request $request) {

        $apartments = Apartment::all();
        $now = Carbon::now('Europe/Rome');
        $evidence_apartments = [];
        $no_promo_apartments = [];

        foreach ($apartments as $apartment) {
            if (count($apartment->promos) != 0) {
                foreach ($apartment->promos as $promo) {
                    $time_ending = $promo->pivot->time_ending;
                    if ($time_ending > $now) {
                        $evidence_apartments[] = $apartment;
                    } elseif ($time_ending < $now) {
                        $apartment->promos()->detach($promo);
                    }
                }
            } else {
                $no_promo_apartments[] = $apartment;
            }
        }

        $rooms = $request->get('rooms');
        $beds = $request->get('beds');
        $wifi = $request->get('wifi');
        $car = $request->get('car');
        $piscina = $request->get('piscina');
        $portineria = $request->get('portineria');
        $sauna = $request->get('sauna');
        $vistamare = $request->get('vistamare');

        // dichiaro le mie costanti per trasformare un raggio espresso in Km in gradi longitudinali e latitudinali
        $R = 6371; // raggio della Terra in km
        $rad = intval($request->get('kmradius')); // di quanti km vogliamo sia il nostro raggio di ricerca
        $lat = floatval($request->get('latitude')); // valore latitudinale ricercato
        $lon = floatval($request->get('longitude')); // valore longitudinale ricercato

        // parametri che trasformano il mio raggio espresso in km in gradi longitudinali e latitudinali
        $params = [
            "maxLat" => $lat + rad2deg($rad/$R),
            "minLat" => $lat - rad2deg($rad/$R),
            "maxLon" => $lon + rad2deg(asin($rad/$R) / cos(deg2rad($lat))),
            "minLon" => $lon - rad2deg(asin($rad/$R) / cos(deg2rad($lat))),
        ];

        // inizializzo la mia query
        $queryApartmentNoPromo = Apartment::query();
        $queryApartmentPromo = Apartment::query();

        if ($wifi == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '1');
            });
        }

        if ($car == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '2');
            });
        }

        if ($piscina == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '3');
            });
        }

        if ($portineria == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '4');
            });
        }

        if ($sauna == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '5');
            });
        }

        if ($vistamare == 'yes') {
            $queryApartmentNoPromo->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '6');
            });
        }

        $queryApartmentNoPromo->where('rooms', '>=' ,$rooms);
        $queryApartmentNoPromo->where('beds', '>=' ,$beds);

        $queryApartmentNoPromo->whereBetween('latitude', [$params['minLat'], $params['maxLat']]);
        $queryApartmentNoPromo->whereBetween('longitude', [$params['minLon'], $params['maxLon']]);

        $queryApartmentPromo->whereBetween('latitude', [$params['minLat'], $params['maxLat']]);
        $queryApartmentPromo->whereBetween('longitude', [$params['minLon'], $params['maxLon']]);


        $promo = $queryApartmentPromo->has('promos')->with('promos')->get();

        $no_promo = $queryApartmentNoPromo->doesnthave('promos')->paginate(2);

        return response()->json([
            'nopromo' => $no_promo,
            'promo' => $promo,
        ]);

    }
}
