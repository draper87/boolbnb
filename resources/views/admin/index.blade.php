@extends('layouts.app')

@section('content')
  <main>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div>
    <div class="container-fluid text-center my_welcome_padding">
      <h1 class="text-capitalize"><b>Benvenuto: {{$user->firstname}}</b></h1>

          <h2>Lista appartmenti </h2>

          <div class="d-inline">
              <a class="btn btn-warning mb-2" href="{{ route('admin.apartments.create') }}">Crea nuovo appartamento</a>
          </div>

          <div class="d-inline">
              <a class="btn btn-warning mb-2" href="{{ route('admin.message') }}">Visualizza messaggi</a>
          </div>
    </div>


        @foreach ($apartments as $apartment)
          <div class="container my_apartment_padding">
            <div class="row my_padding">
              <div class="col-sm-3">
                <img class="circle new_rules" src="{{asset('storage') . '/' . $apartment->image_path}}" alt="appartamento">
              </div>
                <div class="col-sm-9 my_left_spacing">
                  <h4><b>Titolo: {{$apartment->title}}</b></h4>
                  <p><a href="{{ route('admin.apartments.show' , $apartment->id)}}"><button type="button" class="btn btn-success mb-2">Visualizza</button></a>
                    <a href="{{ route('admin.apartments.edit' , $apartment->id)}}"><button type="button" class="btn btn-primary mb-2">Modifica</button></a>
                    <form action="{{route('admin.apartments.destroy', $apartment)}}" method="post">
                      @csrf
                    @method('DELETE')
                    <input class="btn btn-outline-danger mb-2" type="submit" name="" value="ELIMINA">
                  </form></p>
                </div>
            </div><br>
          </div>
        @endforeach
    </div>
  </main>

@endsection
