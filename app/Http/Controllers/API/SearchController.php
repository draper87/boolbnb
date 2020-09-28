<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    public function index(Request $request) {


        // dichiaro le mie costanti per trasformare un raggio espresso in Km in gradi longitudinali e latitudinali
        $R = 6371; // raggio terrestre in km
        $rad = 100; // di quanti km vogliamo sia il nostro raggio di ricerca
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
        $query = Apartment::query();

        $query->whereBetween('latitude', [$params['minLat'], $params['maxLat']]);
        $query->whereBetween('longitude', [$params['minLon'], $params['maxLon']]);

        return $query->get();

    }
}
