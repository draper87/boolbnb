<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Facility;
use Carbon\Carbon;
use App\Stat;

class ApartmentController extends Controller
{
  public function index() {
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

  shuffle($no_promo_apartments);


  return view('guests.index', compact('no_promo_apartments', 'evidence_apartments', 'apartments'));
}

    public function show(Apartment $apartment) {

        $facilities = Facility::all();

        $new_stat = new Stat();
        $new_stat->apartment_id = $apartment->id;
        $new_stat->save();
        return view('guests.show', compact('apartment','facilities'));
    }

    public function sendMessage(Request $request) {

        $requested_data = $request->all();

        $new_message = new Message();
        $new_message->apartment_id = $requested_data['apartment_id'];
        $new_message->message = $requested_data['messagge'];
        $new_message->email = $requested_data['email'];

        $new_message->save();

        return redirect()->route('show', $new_message->apartment);

    }
}
