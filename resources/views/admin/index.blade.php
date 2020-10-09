@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <main>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <div>
            <div id="bachecajumbo" class="container-fluid text-center my_welcome_padding mb-5">
                <h1 class="text-capitalize">Benvenuto {{$user->firstname}}</h1>

                <h5>Qui puoi trovare i tuoi appartmenti</h5>

                <div class="d-inline">
                    <a class="btn_bacheca btn btn-bacheca mt-2 draw-border" href="{{ route('admin.apartments.create') }}"><i class="fas fa-pen"></i> Crea appartamento</a>
                </div>

                <div class="d-inline">
                    <a class="btn_bacheca btn btn-bacheca mt-2 draw-border" href="{{ route('admin.message') }}"><i class="fas fa-inbox"></i>Visualizza messaggi</a>
                </div>
            </div>

            <div class="bacheca">
            @foreach ($apartments as $apartment)

                <div class="card-bacheca position-relative">
                    <div class="card__image-container">
                        <img id="bachecaimg" class="card__image" src="{{asset('storage') . '/' . $apartment->image_path}}" alt="">
                    </div>

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
                    </svg>
                    <div class="button_bacheca">
                      {{-- bottone guarda --}}
                      <span><a class="btn btn-outline-success btn_margin_bacheca" href="{{ route('admin.apartments.show' , $apartment->id)}}"><i class="fas fa-eye"></i></a></span>
                      {{-- bottone modifica --}}
                      <span><a class="btn btn-outline-info btn_margin_bacheca" href="{{ route('admin.apartments.edit' , $apartment->id)}}"><i class="far fa-edit"></i></a></span>
                              {{-- bottone cancella --}}
                              <form id="form_post"action="{{route('admin.apartments.destroy', $apartment)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-danger btn_margin_bacheca" type="submit" name="" value="Elimina"><i class="fas fa-skull"></i></button>
                              </form>
                    </div>
                    <div class="card__content">
                        <h1 class="card__title text-capitalize">{{$apartment->title}}</h1>
                        <p class="overflow_apartment_my">{{$apartment->descrizione}}</p>


                    </div>
                </div>
            @endforeach
            </div>

        </div>
    </main>

@endsection
