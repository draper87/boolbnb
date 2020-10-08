<?php

namespace App\Http\Controllers\Admin;
use App\Message;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
      $user = Auth::user();
      $apartments = Apartment::where('user_id', $user->id)->get();
      // dd($apartments);
      // $messages = Message::where('apartment_id', $apartments->id)->get();
      // dd($messages);
      // foreach ($apartments as $apartment) {
      //   foreach ($apartment->messages as $message) {
      //     echo $message->message;
      //   }
      // }
      return view('admin.message', compact('apartments'));

    }
    public function show(Message $message){
      return view('admin.message_show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.message');
    }
}
