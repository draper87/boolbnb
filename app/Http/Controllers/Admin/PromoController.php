<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Promo;
use Braintree\Gateway;
use Carbon\Carbon;

class PromoController extends Controller
{
    public function index(Apartment $apartment)
    {
        // dd($apartment);
        $promos = Promo::all();

        // foreach ($apartment->promos as $promo) {
        //     $this_promo = Promo::where('id', $promo->id)->first();
        //     dd($promo->pivot->time_ending);
        // }

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        
        //passare time_ending e ora attuale
        return view('admin.promo', compact('token', 'apartment', 'promos'));
    }

    public function checkout(Request $request, Apartment $apartment)
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $promo = $request->promo_selected;

        $this_promo = Promo::where('id', $promo)->first();
        $promo_price = $this_promo->price;

        if ($promo_price != $amount) {
            die('prezzo diverso');
        }

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;

            if (isset($promo)) {
                // fuso orario italiano da mettere
                $scadenza_promo = Carbon::now()->addHours(24);
                // dd($scadenza_promo->addHours('24:00:00'));

                $apartment->promos()->attach($promo, [
                    'time_ending' => $scadenza_promo,
                    'created_at' => Carbon::now(),
                ]);
            }

            return redirect()->route('admin.transaction', compact('apartment'));
        } else {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return redirect()->route('admin.transaction', $result->message); //da testare
        }
    }

    public function transaction(Apartment $apartment)
    {
        // dd($transaction);
        dd($apartment->promos);
        return view('admin.transaction', compact('transaction'));
    }
}
