<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stat;
use App\Apartment;

class StatController extends Controller
{
    public function index(Request $request) {

        $data = $request->all();


        $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-01-01' ,'2020-02-01'])->get();
//        dd($stats_gennaio);
        $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',['2020-02-01' ,'2020-03-01'])->get();
        $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-03-01 00:00:00' ,'2020-04-01 00:00:00'])->get();
        $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-04-01 00:00:00' ,'2020-05-01 00:00:00'])->get();
        $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-05-01 00:00:00' ,'2020-06-01 00:00:00'])->get();
        $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-06-01 00:00:00' ,'2020-07-01 00:00:00'])->get();
        $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-07-01 00:00:00' ,'2020-08-01 00:00:00'])->get();
        $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-08-01 00:00:00' ,'2020-09-01 00:00:00'])->get();
        $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-09-01' ,'2020-10-01'])->get();
        $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-10-01 00:00:00' ,'2020-11-01 00:00:00'])->get();
        $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-11-01 00:00:00' ,'2020-12-01 00:00:00'])->get();
        $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', ['2020-12-01 00:00:00' ,'2021-01-01 00:00:00'])->get();




        return response()->json([
            'gennaio' => $stats_gennaio,
            'febbraio' => $stats_febbraio,
            'marzo' => $stats_marzo,
            'aprile' => $stats_aprile,
            'maggio' => $stats_maggio,
            'giugno' => $stats_giugno,
            'luglio' => $stats_luglio,
            'agosto' => $stats_agosto,
            'settembre' => $stats_settembre,
            'ottobre' => $stats_ottobre,
            'novembre' => $stats_novembre,
            'dicembre' => $stats_dicembre
        ]);

    }
}
