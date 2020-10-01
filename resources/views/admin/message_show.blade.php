@extends('layouts.app')

@section('content')

    <main>
        <div class="container">

            <p>appartamento: {{$message->apartment->title}}</p>
            <p>chi ti ha inviato email: {{$message->email}}</p>
            <p>testo: {{$message->message}}</p>


        </div>
    </main>

@endsection
