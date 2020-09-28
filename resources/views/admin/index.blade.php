@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <h1>Benvenuto: {{$user->firstname}}</h1>
    <div>
        <h2>Lista appartmenti </h2>

        <div>
            <a class="btn btn-primary mb-2" href="{{ route('admin.apartments.create') }}">Crea nuovo appartamento</a>
        </div>

        <div>
            <a class="btn btn-primary mb-2" href="{{ route('admin.message') }}">Visualizza messaggi</a>
        </div>



        @foreach ($apartments as $apartment)
            <ul>
                <li><img src="{{asset('storage') . '/' . $apartment->image_path}}" alt="appartamento"></li>
                <li>Titolo: {{$apartment->title}}</li>
                <li><a href="{{ route('admin.apartments.show' , $apartment->id)}}">Visualizza</a></li>
                <li><a href="{{ route('admin.apartments.edit' , $apartment->id)}}">Modifica</a></li>
                <form action="{{route('admin.apartments.destroy', $apartment)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-primary mb-2" type="submit" name="" value="ELIMINA">
                </form>
            </ul>
        @endforeach
    </div>
@endsection
