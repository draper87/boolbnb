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

        $stats = Stat::where('apartment_id', $data['apartment'])->get();



        return response()->json([
            'statistiche' => $stats,
        ]);

    }
}
