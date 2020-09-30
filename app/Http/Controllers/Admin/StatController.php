<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatController extends Controller
{
//    public function index() {
//
//    }

    public function show(Apartment $apartment) {
        dd($apartment);
        return view('admin.stat', compact('apartment'));
    }
}
