<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    public function index(Request $request) {

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
        $queryApartment = Apartment::query();

        if ($wifi == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '1');
            });
        }

        if ($car == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '2');
            });
        }

        if ($piscina == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '3');
            });
        }

        if ($portineria == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '4');
            });
        }

        if ($sauna == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '5');
            });
        }

        if ($vistamare == 'yes') {
            $queryApartment->whereHas('facilities', function (Builder $query) {
                $query->where('facility_id', '=', '6');
            });
        }

        $queryApartment->where('rooms', '>=' ,$rooms);
        $queryApartment->where('beds', '>=' ,$beds);

        $queryApartment->whereBetween('latitude', [$params['minLat'], $params['maxLat']]);
        $queryApartment->whereBetween('longitude', [$params['minLon'], $params['maxLon']]);

        return $queryApartment->get();

    }
}
