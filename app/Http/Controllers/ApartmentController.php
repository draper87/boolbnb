<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use App\Message;

class ApartmentController extends Controller
{
    public function index() {
        $apartments = Apartment::all();

        return view('guests.index', compact('apartments'));
    }

    public function show(Apartment $apartment) {

        return view('guests.show', compact('apartment'));
    }

    public function sendMessage(Request $request) {

//        $request->validate($this->validationData());

        $requested_data = $request->all();

        $new_message = new Message();
        $new_message->apartment_id = $requested_data['apartment_id'];
        $new_message->message = $requested_data['messagge'];
        $new_message->email = $requested_data['email'];

<<<<<<< HEAD
<<<<<<< HEAD
        $new_message->save();


=======
        // dd($new_message->apartment);
=======
>>>>>>> master
        $new_message->save();

        return redirect()->route('show', $new_message->apartment);
>>>>>>> master
    }
}
