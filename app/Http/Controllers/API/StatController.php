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

        // commento da eliminare , test gitkraken

        $anno_corrente = now()->year;
        $mese_corrente = now()->month;
        $mesi_da_passare = $data['mesi'];


        // for ($i=0; $i < $mesi_da_passare; $i++) {
        //   // code...
        // }

        // NOTE: riga-84 12 mesi
        if ($mesi_da_passare == 3) {
          $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-01-01' ,$anno_corrente . '-02-01'])->get();
          $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
          $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
          $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
          $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
          $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
          $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
          $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
          $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();

          if ($mese_corrente == 1) {
            $anno_corrente = $anno_corrente - 1;

            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }if ($mese_corrente == 2) {
            $anno_corrente = $anno_corrente - 1;


            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }if ($mese_corrente == 3) {
            $anno_corrente = $anno_corrente - 1;


            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }else {
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }
        }elseif ($mesi_da_passare == 6) {
          $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-01-01' ,$anno_corrente . '-02-01'])->get();
          $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
          $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
          $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
          $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
          $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();

          if ($mese_corrente == 1) {
            $anno_corrente = $anno_corrente - 1;

            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 2){
            $anno_corrente = $anno_corrente - 1;

            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 3){
            $anno_corrente = $anno_corrente - 1;

            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 4) {
            $anno_corrente = $anno_corrente - 1;

            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 5) {
            $anno_corrente = $anno_corrente - 1;

            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 6) {
            $anno_corrente = $anno_corrente - 1;

            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }else {
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }
        } elseif ($mesi_da_passare == 12) {
          $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-01-01' ,$anno_corrente . '-02-01'])->get();
          $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
          $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
          $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
          $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
          $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
          $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
          $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
          $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
          $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
          $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
          $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();

          if ($mese_corrente == 1) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-01-01' ,$anno_corrente . '-02-01'])->get();
            $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
            $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
            $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
            $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 2){
            $anno_corrente = $anno_corrente - 1;

            // $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
            $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
            $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
            $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 3){
            $anno_corrente = $anno_corrente - 1;

            // $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
            $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
            $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 4) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
            $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 5) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 6) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 7) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 8) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 9) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 10) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }elseif ($mese_corrente == 11) {
            $anno_corrente = $anno_corrente - 1;

            // $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }else{


            $stats_gennaio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-01-01' ,$anno_corrente . '-02-01'])->get();
            $stats_febbraio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at',[$anno_corrente . '-02-01' ,$anno_corrente . '-03-01'])->get();
            $stats_marzo = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-03-01 ' ,$anno_corrente . '-04-01'])->get();
            $stats_aprile = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-04-01 ' ,$anno_corrente . '-05-01'])->get();
            $stats_maggio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-05-01 ' ,$anno_corrente . '-06-01'])->get();
            $stats_giugno = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-06-01 ' ,$anno_corrente . '-07-01'])->get();
            $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
            $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
            $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
            $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
            $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
            $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          }
          // else {
          //   $stats_luglio = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-07-01 ' ,$anno_corrente . '-08-01'])->get();
          //   $stats_agosto = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-08-01 ' ,$anno_corrente . '-09-01'])->get();
          //   $stats_settembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-09-01' ,$anno_corrente . '-10-01'])->get();
          //   $stats_ottobre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-10-01 ' ,$anno_corrente . '-11-01'])->get();
          //   $stats_novembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-11-01 ' ,$anno_corrente . '-12-01'])->get();
          //   $stats_dicembre = Stat::where('apartment_id', $data['apartment'])->whereBetween('created_at', [$anno_corrente . '-12-01 ' ,$anno_corrente . '-01-01'])->get();
          // }
        }

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
