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

      return view('admin.message', compact('apartments'));

    }
    public function show(Message $message){

        $user = Auth::user();
        $user_message = $message->apartment->user->id;
        if ($user_message == $user->id) {
            return view('admin.message_show', compact('message'));
        }
        else {
            die('Non hai accesso a questa pagina');
        }

    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.message');
    }
}
