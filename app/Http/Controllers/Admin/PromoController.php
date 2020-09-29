<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Promo;
use Braintree\Gateway;
use Braintree\Transaction;

class PromoController extends Controller
{
    public function index(Apartment $apartment)
    {
        // dd($apartment);
        $promos = Promo::all();

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();

        return view('admin.promo', compact('token', 'apartment', 'promos'));
    }

    public function checkout(Request $request, Apartment $apartment)
    {
        // dd($apartment);

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $promo = $request->promo_selected;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success || !is_null($result->transaction)) {
            $transaction = $result->transaction;
            // dd($transaction);

            if (isset($promo)) {
                $apartment->promos()->sync($promo);
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
