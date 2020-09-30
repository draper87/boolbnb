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
        $promos = Promo::all();

        foreach ($apartment->promos as $promo) {
            $time_ending = $promo->pivot->time_ending;
        }
        $carbon_time_ending = new Carbon($time_ending);
        $data_scadenza = $carbon_time_ending->format('d-m-y');

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();

        return view('admin.promo', compact('token', 'apartment', 'promos', 'data_scadenza'));
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
                $scadenza_promo = Carbon::now('Europe/Rome')->addHours($this_promo->timing);

                $apartment->promos()->attach($promo, [
                    'time_ending' => $scadenza_promo,
                    'created_at' => Carbon::now('Europe/Rome'),
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
