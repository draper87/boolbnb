<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatController extends Controller
{
//    public function index() {
//
//    }

    public function show(Apartment $apartment) {

        $user = Auth::user();
        $user_apartment = $apartment->user->id;
        if ($user_apartment == $user->id) {
            return view('admin.stat', compact('apartment'));
        }
        else {
            die('Non hai accesso a questa pagina');
        }


    }
}
