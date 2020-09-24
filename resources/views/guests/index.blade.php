@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <h1>Benvenuto</h1>
    <div>
        <h2>Lista appartmenti</h2>

        @foreach ($apartments as $apartment)
            <ul>
                <li><img src="{{$apartment->image_path}}" alt="appartamento"></li>
                <li>Titolo: {{$apartment->title}}</li>
                <li><a href="{{ route('show' , $apartment->id)}}">Visualizza</a></li>
            </ul>
        @endforeach
    </div>
@endsection



